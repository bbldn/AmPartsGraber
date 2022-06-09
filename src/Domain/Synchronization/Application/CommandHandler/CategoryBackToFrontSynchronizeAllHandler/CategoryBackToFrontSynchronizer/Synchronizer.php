<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer;

use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Category as CategoryGraber;
use App\Domain\Common\Application\Provider\CategoryProvider\Provider as CategoryProvider;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\SeoProSynchronizer\Synchronizer as SeoProSynchronizer;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategorySynchronizer\Synchronizer as CategorySynchronizer;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryToLayoutSynchronizer\Synchronizer as CategoryToLayoutSynchronizer;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryPathListSynchronizer\Synchronizer as CategoryPathListSynchronizer;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryShopListSynchronizer\Synchronizer as CategoryShopListSynchronizer;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryDescriptionListSynchronizer\Synchronizer as CategoryDescriptionListSynchronizer;

class Synchronizer
{
    private EntityManager $entityManagerFront;

    private CategoryProvider $categoryProvider;

    private SeoProSynchronizer $seoProSynchronizer;

    private CategorySynchronizer $categorySynchronizer;

    private CategoryPathListSynchronizer $categoryPathListSynchronizer;

    private CategoryToLayoutSynchronizer $categoryToLayoutSynchronizer;

    private CategoryShopListSynchronizer $categoryShopListSynchronizer;

    private CategoryDescriptionListSynchronizer $categoryDescriptionListSynchronizer;

    /**
     * @param EntityManager $entityManagerFront
     * @param CategoryProvider $categoryProvider
     * @param SeoProSynchronizer $seoProSynchronizer
     * @param CategorySynchronizer $categorySynchronizer
     * @param CategoryPathListSynchronizer $categoryPathListSynchronizer
     * @param CategoryToLayoutSynchronizer $categoryToLayoutSynchronizer
     * @param CategoryShopListSynchronizer $categoryShopListSynchronizer
     * @param CategoryDescriptionListSynchronizer $categoryDescriptionListSynchronizer
     */
    public function __construct(
        EntityManager $entityManagerFront,
        CategoryProvider $categoryProvider,
        SeoProSynchronizer $seoProSynchronizer,
        CategorySynchronizer $categorySynchronizer,
        CategoryPathListSynchronizer $categoryPathListSynchronizer,
        CategoryToLayoutSynchronizer $categoryToLayoutSynchronizer,
        CategoryShopListSynchronizer $categoryShopListSynchronizer,
        CategoryDescriptionListSynchronizer $categoryDescriptionListSynchronizer
    )
    {
        $this->entityManagerFront = $entityManagerFront;
        $this->categoryProvider = $categoryProvider;
        $this->seoProSynchronizer = $seoProSynchronizer;
        $this->categorySynchronizer = $categorySynchronizer;
        $this->categoryPathListSynchronizer = $categoryPathListSynchronizer;
        $this->categoryToLayoutSynchronizer = $categoryToLayoutSynchronizer;
        $this->categoryShopListSynchronizer = $categoryShopListSynchronizer;
        $this->categoryDescriptionListSynchronizer = $categoryDescriptionListSynchronizer;
    }

    /**
     * @param CategoryGraber $categoryGraber
     * @return CategoryFront
     */
    private function getCategoryFrontByCategoryGraber(CategoryGraber $categoryGraber): CategoryFront
    {
        $categoryFront = $this->categoryProvider->getCategoryFrontBeCategoryGraber($categoryGraber);
        if (null !== $categoryFront) {
            return $categoryFront;
        }

        return new CategoryFront();
    }

    /**
     * @param CategoryGraber $categoryGraber
     * @return void
     */
    public function synchronize(CategoryGraber $categoryGraber): void
    {
        $categoryFront = $this->getCategoryFrontByCategoryGraber($categoryGraber);

        $this->categoryPathListSynchronizer->synchronize($categoryFront);
        $this->categoryToLayoutSynchronizer->synchronize($categoryFront);
        $this->categoryShopListSynchronizer->synchronize($categoryFront);
        $this->seoProSynchronizer->synchronize($categoryFront, $categoryGraber);
        $this->categorySynchronizer->synchronize($categoryFront, $categoryGraber);
        $this->categoryDescriptionListSynchronizer->synchronize($categoryFront, $categoryGraber);

        $this->entityManagerFront->persist($categoryFront);
    }
}