<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductCategoryListSynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\Product as ProductFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Product as ProductGraber;
use App\Domain\Common\Domain\Entity\Base\Front\ProductCategory as ProductToCategoryFront;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductCategoryListSynchronizer\CategoryProvider\Provider as CategoryProvider;

class Synchronizer
{
    private CategoryProvider $categoryProvider;

    /**
     * @param CategoryProvider $categoryProvider
     */
    public function __construct(CategoryProvider $categoryProvider)
    {
        $this->categoryProvider = $categoryProvider;
    }

    /**
     * @param ProductFront $productFront
     * @param ProductGraber $productGraber
     * @return void
     */
    public function synchronize(ProductFront $productFront, ProductGraber $productGraber): void
    {
        $mainCategoryFront = $this->categoryProvider->getCategoryFrontByProductGraber($productGraber);
        $mainCategoryFrontId = null === $mainCategoryFront ? null : $mainCategoryFront->getId();
        foreach ($productFront->getProductToCategories() as $index => $productToCategoryFront) {
            $categoryFront = $productToCategoryFront->getCategory();
            if (
                null === $categoryFront
                || null === $categoryFront->getId()
                || $categoryFront->getId() !== $mainCategoryFrontId
            ) {
                $productFront->getProductToCategories()->remove($index);
            }
        }

        if (null === $mainCategoryFrontId) {
            return;
        }

        /** @var ProductToCategoryFront|false $productToCategoryFront */
        $productToCategoryFront = $productFront->getProductToCategories()->first();
        if (false === $productToCategoryFront) {
            $productToCategoryFront = new ProductToCategoryFront();
            $productToCategoryFront->setProduct($productFront);

            $productFront->getProductToCategories()->add($productToCategoryFront);
        }

        $productToCategoryFront->setDefault(true);
        $productToCategoryFront->setCategory($mainCategoryFront);
    }
}