<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer;

use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Domain\Common\Domain\Entity\Base\Front\Product as ProductFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Product as ProductGraber;
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

    private EntityManager $entityManagerFront;

    private SeoProSynchronizer $seoProSynchronizer;

    private ProductSynchronizer $productSynchronizer;

    private ProductToLayoutSynchronizer $productToLayoutSynchronizer;

    private ProductShopListSynchronizer $productShopListSynchronizer;

    private ProductCategoryListSynchronizer $productCategoryListSynchronizer;

    private ProductDescriptionListSynchronizer $productDescriptionListSynchronizer;

    /**
     * @param ProductProvider $productProvider
     * @param EntityManager $entityManagerFront
     * @param SeoProSynchronizer $seoProSynchronizer
     * @param ProductSynchronizer $productSynchronizer
     * @param ProductToLayoutSynchronizer $productToLayoutSynchronizer
     * @param ProductShopListSynchronizer $productShopListSynchronizer
     * @param ProductCategoryListSynchronizer $productCategoryListSynchronizer
     * @param ProductDescriptionListSynchronizer $productDescriptionListSynchronizer
     */
    public function __construct(
        ProductProvider $productProvider,
        EntityManager $entityManagerFront,
        SeoProSynchronizer $seoProSynchronizer,
        ProductSynchronizer $productSynchronizer,
        ProductToLayoutSynchronizer $productToLayoutSynchronizer,
        ProductShopListSynchronizer $productShopListSynchronizer,
        ProductCategoryListSynchronizer $productCategoryListSynchronizer,
        ProductDescriptionListSynchronizer $productDescriptionListSynchronizer
    )
    {
        $this->productProvider = $productProvider;
        $this->entityManagerFront = $entityManagerFront;
        $this->seoProSynchronizer = $seoProSynchronizer;
        $this->productSynchronizer = $productSynchronizer;
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

        $this->entityManagerFront->persist($productFront);
    }
}