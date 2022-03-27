<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryShopListSynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
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
     * @param CategoryFront $categoryFront
     * @return void
     */
    public function synchronize(CategoryFront $categoryFront): void
    {
        foreach ($categoryFront->getShops() as $index => $shopFront) {
            if (false === $this->shopProvider->isDefaultShopFront($shopFront)) {
                $categoryFront->getShops()->remove($index);
            }
        }

        if ($categoryFront->getShops()->count() === 0) {
            $categoryFront->getShops()->add($this->shopProvider->getDefaultShopFront());
        }
    }
}