<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryToLayoutSynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Common\Application\Provider\ShopProvider\Provider as ShopProvider;
use App\Domain\Common\Application\Provider\LayoutProvider\Provider as LayoutProvider;
use App\Domain\Common\Domain\Entity\Base\Front\CategoryToLayout as CategoryToLayoutFront;
use App\Domain\Common\Application\MultipleEntityManager\EntityManager as MultipleEntityManager;

class Synchronizer
{
    private ShopProvider $shopProvider;

    private LayoutProvider $layoutProvider;

    private MultipleEntityManager $multipleEntityManager;

    /**
     * @param ShopProvider $shopProvider
     * @param LayoutProvider $layoutProvider
     * @param MultipleEntityManager $multipleEntityManager
     */
    public function __construct(
        ShopProvider $shopProvider,
        LayoutProvider $layoutProvider,
        MultipleEntityManager $multipleEntityManager
    )
    {
        $this->shopProvider = $shopProvider;
        $this->layoutProvider = $layoutProvider;
        $this->multipleEntityManager = $multipleEntityManager;
    }

    /**
     * @param CategoryFront $categoryFront
     * @return void
     */
    public function synchronize(CategoryFront $categoryFront): void
    {
        $mainCategoryToLayoutFront = null;
        foreach ($categoryFront->getCategoryToLayouts() as $index => $categoryToLayoutFront) {
            $shopFront = $categoryToLayoutFront->getShop();
            if (true === $this->shopProvider->isDefaultShopFront($shopFront)) {
                $layoutFront = $categoryToLayoutFront->getLayout();
                if ($this->layoutProvider->isDefaultCategoryLayoutFront($layoutFront)) {
                    $mainCategoryToLayoutFront = $categoryToLayoutFront;
                    continue;
                }
            }

            $categoryFront->getCategoryToLayouts()->remove($index);
            $this->multipleEntityManager->removeFront($categoryToLayoutFront);
        }

        if (null !== $mainCategoryToLayoutFront) {
            return;
        }

        $mainCategoryToLayoutFront = new CategoryToLayoutFront();
        $mainCategoryToLayoutFront->setCategory($categoryFront);
        $mainCategoryToLayoutFront->setShop($this->shopProvider->getDefaultShopFront());
        $mainCategoryToLayoutFront->setLayout($this->layoutProvider->getDefaultCategoryLayoutFront());

        $this->multipleEntityManager->persistFront($mainCategoryToLayoutFront);
    }
}