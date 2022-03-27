<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategorySynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Category as CategoryGraber;
use App\Domain\Common\Application\Provider\CategoryProvider\Provider as CategoryProvider;

class Synchronizer
{
    private CategoryProvider $categoryProvider;

    /**
     * @param CategoryProvider $categoryProvider
     */
    public function __construct(CategoryProvider $categoryProvider)
    {
        $this->categoryProvider = $categoryProvider;
    }

    /**
     * @param CategoryFront $categoryFront
     * @param CategoryGraber $categoryGraber
     * @return void
     */
    public function synchronize(CategoryFront $categoryFront, CategoryGraber $categoryGraber): void
    {
        $parent = $this->categoryProvider->getCategoryFrontBeCategoryGraber($categoryGraber->getParent());

        $categoryFront->setTop(true);
        $categoryFront->setColumn(1);
        $categoryFront->setImage('');
        $categoryFront->setSortOrder(0);
        $categoryFront->setStatus(true);
        $categoryFront->setParent($parent);
        $categoryFront->setVendorCode($categoryGraber->getUrl());
    }
}