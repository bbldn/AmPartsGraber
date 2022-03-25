<?php

namespace App\Domain\Graber\Infrastructure\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use App\Domain\Common\Application\CommandBus\CommandBus;
use App\Domain\Graber\Application\Command\ParseProductListAll;

class ParseProductListAllCommand extends Command
{
    protected static $defaultName = 'project:parse:product:list:all';

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
        /** @var ConsoleOutput $output */

        $command = new ParseProductListAll();
        if (OutputInterface::VERBOSITY_NORMAL !== $output->getVerbosity()) {
            $categoryProgressBar = new ProgressBar($output->section());
            $categoryProgressBar->setFormat('%current%/%max% [%bar%] %percent%% %elapsed% %memory%');
            $categoryProgressBar->start();

            $productProgressBar = new ProgressBar($output->section());
            $productProgressBar->setFormat('%current%/%max% [%bar%] %percent%%');
            $productProgressBar->start();

            $command->setOnStartProduct(static fn(int $max) => $productProgressBar->start($max));
            $command->setOnStartCategory(static fn(int $max) => $categoryProgressBar->start($max));
            $command->setOnSetProductProgress(static fn(int $step) => $productProgressBar->setProgress($step));
            $command->setOnSetCategoryProgress(static fn(int $step) => $categoryProgressBar->setProgress($step));

            $productProgressBar->finish();
            $categoryProgressBar->finish();

            $this->commandBus->execute($command);

            $output->write(PHP_EOL);
        } else {
            $this->commandBus->execute($command);
        }

        return self::SUCCESS;
    }
}