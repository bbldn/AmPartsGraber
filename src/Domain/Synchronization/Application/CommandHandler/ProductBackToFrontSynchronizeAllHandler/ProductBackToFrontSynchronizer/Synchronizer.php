<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\Product as ProductFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Product as ProductGraber;
use App\Domain\Common\Application\MultipleEntityManager\EntityManager as MultipleEntityManager;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductProvider\Provider as ProductProvider;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\SeoProSynchronizer\Synchronizer as SeoProSynchronizer;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductSynchronizer\Synchronizer as ProductSynchronizer;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductToLayoutSynchronizer\Synchronizer as ProductToLayoutSynchronizer;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductShopListSynchronizer\Synchronizer as ProductShopListSynchronizer;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductCategoryListSynchronizer\Synchronizer as ProductCategoryListSynchronizer;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductDescriptionListSynchronizer\Synchronizer as ProductDescriptionListSynchronizer;

class Synchronizer
{
    private ProductProvider $productProvider;

    private SeoProSynchronizer $seoProSynchronizer;

    private ProductSynchronizer $productSynchronizer;

    private MultipleEntityManager $multipleEntityManager;

    private ProductToLayoutSynchronizer $productToLayoutSynchronizer;

    private ProductShopListSynchronizer $productShopListSynchronizer;

    private ProductCategoryListSynchronizer $productCategoryListSynchronizer;

    private ProductDescriptionListSynchronizer $productDescriptionListSynchronizer;

    /**
     * @param ProductProvider $productProvider
     * @param SeoProSynchronizer $seoProSynchronizer
     * @param ProductSynchronizer $productSynchronizer
     * @param MultipleEntityManager $multipleEntityManager
     * @param ProductToLayoutSynchronizer $productToLayoutSynchronizer
     * @param ProductShopListSynchronizer $productShopListSynchronizer
     * @param ProductCategoryListSynchronizer $productCategoryListSynchronizer
     * @param ProductDescriptionListSynchronizer $productDescriptionListSynchronizer
     */
    public function __construct(
        ProductProvider $productProvider,
        SeoProSynchronizer $seoProSynchronizer,
        ProductSynchronizer $productSynchronizer,
        MultipleEntityManager $multipleEntityManager,
        ProductToLayoutSynchronizer $productToLayoutSynchronizer,
        ProductShopListSynchronizer $productShopListSynchronizer,
        ProductCategoryListSynchronizer $productCategoryListSynchronizer,
        ProductDescriptionListSynchronizer $productDescriptionListSynchronizer
    )
    {
        $this->productProvider = $productProvider;
        $this->seoProSynchronizer = $seoProSynchronizer;
        $this->productSynchronizer = $productSynchronizer;
        $this->multipleEntityManager = $multipleEntityManager;
        $this->productToLayoutSynchronizer = $productToLayoutSynchronizer;
        $this->productShopListSynchronizer = $productShopListSynchronizer;
        $this->productCategoryListSynchronizer = $productCategoryListSynchronizer;
        $this->productDescriptionListSynchronizer = $productDescriptionListSynchronizer;
    }

    /**
     * @param ProductGraber $productGraber
     * @return void
     */
    public function synchronize(ProductGraber $productGraber): void
    {
        $productFront = $this->productProvider->getProductFrontByProductGraber($productGraber);
        if (null === $productFront) {
            $productFront = new ProductFront();
        }

        $this->productToLayoutSynchronizer->synchronize($productFront);
        $this->productShopListSynchronizer->synchronize($productFront);
        $this->seoProSynchronizer->synchronize($productFront, $productGraber);
        $this->productSynchronizer->synchronize($productFront, $productGraber);
        $this->productCategoryListSynchronizer->synchronize($productFront, $productGraber);
        $this->productDescriptionListSynchronizer->synchronize($productFront, $productGraber);

        $this->multipleEntityManager->persistFront($productFront);
    }
}