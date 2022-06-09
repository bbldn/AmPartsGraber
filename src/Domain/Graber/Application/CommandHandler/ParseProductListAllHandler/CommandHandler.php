<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler;

use App\Domain\Graber\Domain\Exception\ParseException;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Domain\Graber\Application\Command\ParseProductListAll;
use App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\Repository\CategoryRepository;
use App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductSaver\Saver as ProductSaver;
use App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductParser\Parser as ProductParser;
use App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\SessionManager\SessionManagerFacade as SessionManager;
use App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductUrlListFromCategoryParser\Parser as ProductUrlListFromCategoryParser;

class CommandHandler
{
    private ProductSaver $productSaver;

    private ProductParser $productParser;

    private SessionManager $sessionManager;

    private EntityManager $entityManagerGraber;

    private CategoryRepository $categoryRepository;

    private ProductUrlListFromCategoryParser $productUrlListFromCategoryParser;

    /**
     * @param ProductSaver $productSaver
     * @param ProductParser $productParser
     * @param SessionManager $sessionManager
     * @param EntityManager $entityManagerGraber
     * @param CategoryRepository $categoryRepository
     * @param ProductUrlListFromCategoryParser $productUrlListFromCategoryParser
     */
    public function __construct(
        ProductSaver $productSaver,
        ProductParser $productParser,
        SessionManager $sessionManager,
        EntityManager $entityManagerGraber,
        CategoryRepository $categoryRepository,
        ProductUrlListFromCategoryParser $productUrlListFromCategoryParser
    )
    {
        $this->productSaver = $productSaver;
        $this->productParser = $productParser;
        $this->sessionManager = $sessionManager;
        $this->entityManagerGraber = $entityManagerGraber;
        $this->categoryRepository = $categoryRepository;
        $this->productUrlListFromCategoryParser = $productUrlListFromCategoryParser;
    }

    /**
     * @param ParseProductListAll $command
     * @return void
     */
    public function __invoke(ParseProductListAll $command): void
    {
        $onStartProduct = $command->getOnStartProduct();
        $onStartCategory = $command->getOnStartCategory();
        $onSetProductProgress = $command->getOnSetProductProgress();
        $onSetCategoryProgress = $command->getOnSetCategoryProgress();

        $categoryList = $this->categoryRepository->findAll();
        if (null !== $onStartCategory) {
            call_user_func($onStartCategory, count($categoryList));
        }

        $handledProductList = [];
        foreach ($categoryList as $categoryIndex => $category) {
            if ($categoryIndex < $this->sessionManager->getCategoryIndex()) {
                continue;
            }

            $url = $category->getUrl();
            if (null === $url) {
                continue;
            }

            if (null !== $onSetCategoryProgress) {
                call_user_func($onSetCategoryProgress, $categoryIndex);
            }

            try {
                $productUrlList = $this->productUrlListFromCategoryParser->parse($url);
            } catch (ParseException) {
                continue;
            }

            if (null !== $onStartProduct) {
                call_user_func($onStartProduct, count($productUrlList));
            }

            foreach ($productUrlList as $productIndex => $productUrl) {
                if (null !== $onSetProductProgress) {
                    call_user_func($onSetProductProgress, $productIndex);
                }

                try {
                    $productDTO = $this->productParser->parser($productUrl);
                } catch (ParseException) {
                    continue;
                }

                if (null !== $productDTO) {
                    $code = (string)$productDTO->getCode();
                    if (false === key_exists($code, $handledProductList)) {
                        $handledProductList[$code] = true;
                        $this->productSaver->save($productDTO);
                    }
                }
            }

            $this->entityManagerGraber->flush();
            $this->entityManagerGraber->clear();

            $this->sessionManager->setCategoryIndex($categoryIndex);
        }
    }
}