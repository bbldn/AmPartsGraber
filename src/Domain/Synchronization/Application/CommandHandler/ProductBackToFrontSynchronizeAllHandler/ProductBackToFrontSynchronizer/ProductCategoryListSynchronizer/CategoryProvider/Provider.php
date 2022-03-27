<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductCategoryListSynchronizer\CategoryProvider;

use App\Domain\Common\Domain\Entity\Base\Graber\Product as ProductGraber;
use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductCategoryListSynchronizer\CategoryProvider\Repository\Front\CategoryRepository as CategoryFrontRepository;

class Provider
{
    private CategoryFrontRepository $categoryFrontRepository;

    /**
     * @param CategoryFrontRepository $categoryFrontRepository
     */
    public function __construct(CategoryFrontRepository $categoryFrontRepository)
    {
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

        return $this->categoryFrontRepository->findOneByVendorCode($categoryUrl);
    }
}