<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategorySynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Category as CategoryGraber;
use App\Domain\Common\Application\Provider\CategoryProvider\Provider as CategoryProvider;
use App\Domain\Common\Application\MultipleEntityManager\EntityManager as MultipleEntityManager;

class Synchronizer
{
    private CategoryProvider $categoryProvider;

    private MultipleEntityManager $multipleEntityManager;

    /**
     * @param CategoryProvider $categoryProvider
     * @param MultipleEntityManager $multipleEntityManager
     */
    public function __construct(
        CategoryProvider $categoryProvider,
        MultipleEntityManager $multipleEntityManager
    )
    {
        $this->categoryProvider = $categoryProvider;
        $this->multipleEntityManager = $multipleEntityManager;
    }

    /**
     * @param CategoryFront $categoryFront
     * @param CategoryGraber $categoryGraber
     * @return void
     */
    public function synchronize(CategoryFront $categoryFront, CategoryGraber $categoryGraber): void
    {
        $parent = $this->categoryProvider->getCategoryFrontBeCategoryGraber($categoryGraber->getParent());
        $categoryFront->setParent($parent);

        $categoryFront->setTop(true);
        $categoryFront->setColumn(1);
        $categoryFront->setImage('');
        $categoryFront->setSortOrder(0);
        $categoryFront->setStatus(true);

        $this->multipleEntityManager->persistFront($categoryFront);
    }
}