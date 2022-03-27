<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductShopListSynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\Product as ProductFront;
use App\Domain\Common\Application\Provider\ShopProvider\Provider as ShopProvider;

class Synchronizer
{
    private ShopProvider $shopProvider;

    /**
     * @param ShopProvider $shopProvider
     */
    public function __construct(ShopProvider $shopProvider)
    {
        $this->shopProvider = $shopProvider;
    }

    /**
     * @param ProductFront $productFront
     * @return void
     */
    public function synchronize(ProductFront $productFront): void
    {
        foreach ($productFront->getShops() as $index => $shopFront) {
            if (false === $this->shopProvider->isDefaultShopFront($shopFront)) {
                $productFront->getShops()->remove($index);
            }
        }

        if ($productFront->getShops()->count() === 0) {
            $productFront->getShops()->add($this->shopProvider->getDefaultShopFront());
        }
    }
}