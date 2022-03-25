<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler;

use Closure;
use App\Domain\Graber\Domain\Entity\Category;
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
     * @param Category $category
     * @param Closure|null $onHandledProduct
     * @return void
     * @throws ParseException
     *
     * @psalm-param null|Closure():void $onHandledProduct
     */
    private function handleCategory(Category $category, ?Closure $onHandledProduct): void
    {
        $url = $category->getUrl();
        if (null === $url) {
            return;
        }

        $productUrlList = $this->productUrlListFromCategoryParser->parse($url);
        foreach ($productUrlList as $productUrl) {
            $productDTO = $this->productParser->parser($productUrl);
            if (null !== $productDTO) {
                $this->productSaver->save($productDTO);
                if (null !== $onHandledProduct) {
                    call_user_func($onHandledProduct);
                }
            }
        }
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

        $onHandledProduct = $command->getOnHandledProduct();
        $onHandledCategory = $command->getOnHandledCategory();
        foreach ($categoryList as $category) {
            $this->handleCategory($category, $onHandledProduct);
            if (null !== $onHandledCategory) {
                call_user_func($onHandledCategory);
            }
        }

        $this->entityManager->flush();
    }
}