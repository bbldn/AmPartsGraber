<?php

namespace App\Domain\Synchronization\Infrastructure\Command;

use BBLDN\CQRSBundle\CommandBus\CommandBus;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Domain\Synchronization\Application\Command\ProductBackToFrontSynchronizeAll;

class ProductBackToFrontSynchronizeAllCommand extends Command
{
    protected static $defaultName = 'project:synchronize:product:back-to-front:list:all';

    private CommandBus $commandBus;

    /**
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        parent::__construct();
        $this->commandBus = $commandBus;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $command = new ProductBackToFrontSynchronizeAll();
        if (OutputInterface::VERBOSITY_NORMAL !== $output->getVerbosity()) {
            $progressBar = new ProgressBar($output);

            /** @psalm-suppress MissingClosureReturnType */
            $command->setOnStart(static fn(int $max) => $progressBar->start($max));

            /** @psalm-suppress MissingClosureReturnType */
            $command->setOnSetProgress(static fn(int $step) => $progressBar->setProgress($step));
        }

        $this->commandBus->execute($command);

        $output->write(PHP_EOL);

        return self::SUCCESS;
    }
}