<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler;

use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Domain\Synchronization\Application\Command\ProductBackToFrontSynchronizeAll;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\Repository\Graber\ProductRepository as ProductGraberRepository;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\Synchronizer as ProductBackToFrontSynchronizer;

class CommandHandler
{
    private EntityManager $entityManagerFront;

    private ProductGraberRepository $productGraberRepository;

    private ProductBackToFrontSynchronizer $productBackToFrontSynchronizer;

    /**
     * @param EntityManager $entityManagerFront
     * @param ProductGraberRepository $productGraberRepository
     * @param ProductBackToFrontSynchronizer $productBackToFrontSynchronizer
     */
    public function __construct(
        EntityManager $entityManagerFront,
        ProductGraberRepository $productGraberRepository,
        ProductBackToFrontSynchronizer $productBackToFrontSynchronizer
    )
    {
        $this->entityManagerFront = $entityManagerFront;
        $this->productGraberRepository = $productGraberRepository;
        $this->productBackToFrontSynchronizer = $productBackToFrontSynchronizer;
    }

    /**
     * @param ProductBackToFrontSynchronizeAll $command
     * @return void
     */
    public function __invoke(ProductBackToFrontSynchronizeAll $command): void
    {
        $onStart = $command->getOnStart();
        $onSetProgress = $command->getOnSetProgress();

        $productGraberList = $this->productGraberRepository->findAll();
        if (null !== $onStart) {
            call_user_func($onStart, count($productGraberList));
        }

        foreach ($productGraberList as $index => $productGraber) {
            $this->productBackToFrontSynchronizer->synchronize($productGraber);
            if (null !== $onSetProgress) {
                call_user_func($onSetProgress, $index + 1);
            }
        }

        $this->entityManagerFront->flush();
    }
}