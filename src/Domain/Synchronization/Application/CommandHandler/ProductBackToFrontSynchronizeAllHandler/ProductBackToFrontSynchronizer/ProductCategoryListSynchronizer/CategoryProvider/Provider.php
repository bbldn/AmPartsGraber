<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductCategoryListSynchronizer\CategoryProvider;

use App\Domain\Common\Domain\Entity\Base\Graber\Product as ProductGraber;
use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductCategoryListSynchronizer\CategoryProvider\Repository\Front\SeoUrlRepository as SeoUrlFrontRepository;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductCategoryListSynchronizer\CategoryProvider\Repository\Front\CategoryRepository as CategoryFrontRepository;

class Provider
{
    private SeoUrlFrontRepository $seoUrlFrontRepository;

    private CategoryFrontRepository $categoryFrontRepository;

    /**
     * @param SeoUrlFrontRepository $seoUrlFrontRepository
     * @param CategoryFrontRepository $categoryFrontRepository
     */
    public function __construct(SeoUrlFrontRepository $seoUrlFrontRepository, CategoryFrontRepository $categoryFrontRepository)
    {
        $this->seoUrlFrontRepository = $seoUrlFrontRepository;
        $this->categoryFrontRepository = $categoryFrontRepository;
    }

    /**
     * @param ProductGraber $productGraber
     * @return CategoryFront|null
     */
    public function getCategoryFrontByProductGraber(ProductGraber $productGraber): ?CategoryFront
    {
        $categoryUrl = $productGraber->getCategoryUrl();
        if (null === $categoryUrl) {
            return null;
        }

        $seoUrl = $this->seoUrlFrontRepository->findOneByKeyword($categoryUrl);
        if (null === $seoUrl) {
            return null;
        }

        $categoryFrontId = str_replace('category_id=', '', (string)$seoUrl->getQuery());
        if (false === is_numeric($categoryFrontId)) {
            return null;
        }

        return $this->categoryFrontRepository->findOne($categoryFrontId);
    }
}