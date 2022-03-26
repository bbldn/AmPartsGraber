<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategorySynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Category as CategoryGraber;
use App\Domain\Common\Application\MultipleEntityManager\EntityManager as MultipleEntityManager;

class Synchronizer
{
    private MultipleEntityManager $multipleEntityManager;

    /**
     * @param MultipleEntityManager $multipleEntityManager
     */
    public function __construct(MultipleEntityManager $multipleEntityManager)
    {
        $this->multipleEntityManager = $multipleEntityManager;
    }

    /**
     * @param CategoryFront $categoryFront
     * @param CategoryGraber $categoryGraber
     * @return void
     */
    public function synchronize(CategoryFront $categoryFront, CategoryGraber $categoryGraber): void
    {
        $categoryFront->setTop(true);
        $categoryFront->setColumn(1);
        $categoryFront->setImage('');
        $categoryFront->setSortOrder(0);
        $categoryFront->setStatus(true);

        $this->multipleEntityManager->persistFront($categoryFront);
    }
}