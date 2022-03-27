<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler;

use App\Domain\Synchronization\Application\Command\ProductBackToFrontSynchronizeAll;
use App\Domain\Common\Application\MultipleEntityManager\EntityManager as MultipleEntityManager;
use App\Domain\Synchronization\Application\Command\ProductBackToFrontSynchronizeAllHandler as Base;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\Repository\Graber\ProductRepository as ProductGraberRepository;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\Synchronizer as ProductBackToFrontSynchronizer;

class CommandHandler implements Base
{
    private MultipleEntityManager $multipleEntityManager;

    private ProductGraberRepository $productGraberRepository;

    private ProductBackToFrontSynchronizer $productBackToFrontSynchronizer;

    /**
     * @param MultipleEntityManager $multipleEntityManager
     * @param ProductGraberRepository $productGraberRepository
     * @param ProductBackToFrontSynchronizer $productBackToFrontSynchronizer
     */
    public function __construct(
        MultipleEntityManager $multipleEntityManager,
        ProductGraberRepository $productGraberRepository,
        ProductBackToFrontSynchronizer $productBackToFrontSynchronizer
    )
    {
        $this->multipleEntityManager = $multipleEntityManager;
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

        $this->multipleEntityManager->flushFront();
    }
}