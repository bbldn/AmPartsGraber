<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Category as CategoryGraber;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategorySynchronizer\Synchronizer as CategorySynchronizer;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryShopListSynchronizer\Synchronizer as CategoryShopListSynchronizer;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryToLayoutSynchronizer\Synchronizer as CategoryToLayoutSynchronizer;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryDescriptionListSynchronizer\Synchronizer as CategoryDescriptionListSynchronizer;

class Synchronizer
{
    private CategorySynchronizer $categorySynchronizer;

    private CategoryToLayoutSynchronizer $categoryToLayoutSynchronizer;

    private CategoryShopListSynchronizer $categoryShopListSynchronizer;

    private CategoryDescriptionListSynchronizer $categoryDescriptionListSynchronizer;

    /**
     * @param CategorySynchronizer $categorySynchronizer
     * @param CategoryToLayoutSynchronizer $categoryToLayoutSynchronizer
     * @param CategoryShopListSynchronizer $categoryShopListSynchronizer
     * @param CategoryDescriptionListSynchronizer $categoryDescriptionListSynchronizer
     */
    public function __construct(
        CategorySynchronizer $categorySynchronizer,
        CategoryToLayoutSynchronizer $categoryToLayoutSynchronizer,
        CategoryShopListSynchronizer $categoryShopListSynchronizer,
        CategoryDescriptionListSynchronizer $categoryDescriptionListSynchronizer
    )
    {
        $this->categorySynchronizer = $categorySynchronizer;
        $this->categoryToLayoutSynchronizer = $categoryToLayoutSynchronizer;
        $this->categoryShopListSynchronizer = $categoryShopListSynchronizer;
        $this->categoryDescriptionListSynchronizer = $categoryDescriptionListSynchronizer;
    }

    /**
     * @param CategoryGraber $categoryGraber
     * @return void
     */
    public function synchronize(CategoryGraber $categoryGraber): void
    {
        $categoryFront = new CategoryFront();

        $this->categoryToLayoutSynchronizer->synchronize($categoryFront);
        $this->categoryShopListSynchronizer->synchronize($categoryFront);
        $this->categorySynchronizer->synchronize($categoryFront, $categoryGraber);
        $this->categoryDescriptionListSynchronizer->synchronize($categoryFront, $categoryGraber);
    }
}