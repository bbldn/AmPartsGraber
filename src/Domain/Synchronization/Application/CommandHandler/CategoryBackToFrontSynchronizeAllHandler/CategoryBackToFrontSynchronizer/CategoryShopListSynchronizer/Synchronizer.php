<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryShopListSynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Common\Application\Provider\ShopProvider\Provider as ShopProvider;
use App\Domain\Common\Application\MultipleEntityManager\EntityManager as MultipleEntityManager;

class Synchronizer
{
    private ShopProvider $shopProvider;

    private MultipleEntityManager $multipleEntityManager;

    /**
     * @param ShopProvider $shopProvider
     * @param MultipleEntityManager $multipleEntityManager
     */
    public function __construct(
        ShopProvider $shopProvider,
        MultipleEntityManager $multipleEntityManager
    )
    {
        $this->shopProvider = $shopProvider;
        $this->multipleEntityManager = $multipleEntityManager;
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

        $this->multipleEntityManager->persistFront($categoryFront);
    }
}