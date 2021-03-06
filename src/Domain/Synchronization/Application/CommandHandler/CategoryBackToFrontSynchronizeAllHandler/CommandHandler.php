<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler;

use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Domain\Synchronization\Application\Command\CategoryBackToFrontSynchronizeAll;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\Repository\Graber\CategoryRepository as CategoryGraberRepository;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\Synchronizer as CategoryBackToFrontSynchronizer;

class CommandHandler
{
    private EntityManager $entityManagerFront;

    private CategoryGraberRepository $categoryGraberRepository;

    private CategoryBackToFrontSynchronizer $categoryBackToFrontSynchronizer;

    /**
     * @param EntityManager $entityManagerFront
     * @param CategoryGraberRepository $categoryGraberRepository
     * @param CategoryBackToFrontSynchronizer $categoryBackToFrontSynchronizer
     */
    public function __construct(
        EntityManager $entityManagerFront,
        CategoryGraberRepository $categoryGraberRepository,
        CategoryBackToFrontSynchronizer $categoryBackToFrontSynchronizer
    )
    {
        $this->entityManagerFront = $entityManagerFront;
        $this->categoryGraberRepository = $categoryGraberRepository;
        $this->categoryBackToFrontSynchronizer = $categoryBackToFrontSynchronizer;
    }

    /**
     * @param CategoryBackToFrontSynchronizeAll $command
     * @return void
     */
    public function __invoke(CategoryBackToFrontSynchronizeAll $command): void
    {
        $onStart = $command->getOnStart();
        $onSetProgress = $command->getOnSetProgress();

        $categoryGraberList = $this->categoryGraberRepository->findAll();
        if (null !== $onStart) {
            call_user_func($onStart, count($categoryGraberList));
        }

        foreach ($categoryGraberList as $index => $categoryGraber) {
            $this->categoryBackToFrontSynchronizer->synchronize($categoryGraber);
            if (null !== $onSetProgress) {
                call_user_func($onSetProgress, $index + 1);
            }
        }

        $this->entityManagerFront->flush();
    }
}