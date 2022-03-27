<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductToLayoutSynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\Product as ProductFront;
use App\Domain\Common\Application\Provider\ShopProvider\Provider as ShopProvider;
use App\Domain\Common\Application\Provider\LayoutProvider\Provider as LayoutProvider;
use App\Domain\Common\Domain\Entity\Base\Front\ProductToLayout as ProductToLayoutFront;

class Synchronizer
{
    private ShopProvider $shopProvider;

    private LayoutProvider $layoutProvider;

    /**
     * @param ShopProvider $shopProvider
     * @param LayoutProvider $layoutProvider
     */
    public function __construct(
        ShopProvider $shopProvider,
        LayoutProvider $layoutProvider
    )
    {
        $this->shopProvider = $shopProvider;
        $this->layoutProvider = $layoutProvider;
    }

    /**
     * @param ProductFront $productFront
     * @return void
     */
    public function synchronize(ProductFront $productFront): void
    {
        $mainCategoryToLayoutFront = null;
        foreach ($productFront->getProductToLayouts() as $index => $productToLayoutFront) {
            $shopFront = $productToLayoutFront->getShop();
            if (true === $this->shopProvider->isDefaultShopFront($shopFront)) {
                $layoutFront = $productToLayoutFront->getLayout();
                if ($this->layoutProvider->isDefaultProductLayoutFront($layoutFront)) {
                    $mainCategoryToLayoutFront = $productToLayoutFront;
                    continue;
                }
            }

            $productFront->getProductToLayouts()->remove($index);
        }

        if (null !== $mainCategoryToLayoutFront) {
            return;
        }

        $mainCategoryToLayoutFront = new ProductToLayoutFront();
        $mainCategoryToLayoutFront->setProduct($productFront);
        $mainCategoryToLayoutFront->setShop($this->shopProvider->getDefaultShopFront());
        $mainCategoryToLayoutFront->setLayout($this->layoutProvider->getDefaultProductLayoutFront());

        $productFront->getProductToLayouts()->add($mainCategoryToLayoutFront);
    }
}