<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler;

use App\Domain\Graber\Domain\Exception\ParseException;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Domain\Graber\Application\Command\ParseProductListAll;
use App\Domain\Graber\Application\Command\ParseProductListAllHandler as Base;
use App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\Repository\CategoryRepository;
use App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductSaver\Saver as ProductSaver;
use App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductParser\Parser as ProductParser;
use App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductUrlListFromCategoryParser\Parser as ProductUrlListFromCategoryParser;

class CommandHandler implements Base
{
    private ProductSaver $productSaver;

    private EntityManager $entityManager;

    private ProductParser $productParser;

    private CategoryRepository $categoryRepository;

    private ProductUrlListFromCategoryParser $productUrlListFromCategoryParser;

    /**
     * @param ProductSaver $productSaver
     * @param EntityManager $entityManager
     * @param ProductParser $productParser
     * @param CategoryRepository $categoryRepository
     * @param ProductUrlListFromCategoryParser $productUrlListFromCategoryParser
     */
    public function __construct(
        ProductSaver $productSaver,
        EntityManager $entityManager,
        ProductParser $productParser,
        CategoryRepository $categoryRepository,
        ProductUrlListFromCategoryParser $productUrlListFromCategoryParser
    )
    {
        $this->productSaver = $productSaver;
        $this->entityManager = $entityManager;
        $this->productParser = $productParser;
        $this->categoryRepository = $categoryRepository;
        $this->productUrlListFromCategoryParser = $productUrlListFromCategoryParser;
    }

    /**
     * @param ParseProductListAll $command
     * @return void
     * @throws ParseException
     */
    public function __invoke(ParseProductListAll $command): void
    {
        $categoryList = $this->categoryRepository->findAll();
        $onReceivedCategoryList = $command->getOnReceivedCategoryList();
        if (null !== $onReceivedCategoryList) {
            call_user_func($onReceivedCategoryList, count($categoryList));
        }

        $handledProductList = [];

        $onHandledProduct = $command->getOnHandledProduct();
        $onHandledCategory = $command->getOnHandledCategory();
        $onReceivedProductList = $command->getOnReceivedProductList();
        foreach ($categoryList as $category) {
            $url = $category->getUrl();
            if (null === $url) {
                continue;
            }

            $productUrlList = $this->productUrlListFromCategoryParser->parse($url);
            if (null !== $onReceivedProductList) {
                call_user_func($onReceivedProductList, count($productUrlList));
            }

            foreach ($productUrlList as $productUrl) {
                $productDTO = $this->productParser->parser($productUrl);
                if (null !== $productDTO) {
                    $code = (string)$productDTO->getCode();
                    if (false === key_exists($code, $handledProductList)) {
                        $handledProductList[$code] = true;
                        $this->productSaver->save($productDTO);
                    }
                }

                if (null !== $onHandledProduct) {
                    call_user_func($onHandledProduct);
                }
            }

            $this->entityManager->flush();
            if (null !== $onHandledCategory) {
                call_user_func($onHandledCategory);
            }
        }
    }
}