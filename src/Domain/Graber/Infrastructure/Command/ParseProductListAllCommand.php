<?php

namespace App\Domain\Graber\Infrastructure\Command;

use BBLDN\CQRS\CommandBus\CommandBus;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Domain\Common\Application\ProgressBar\ProgressBar;
use App\Domain\Graber\Application\Command\ParseProductListAll;

class ParseProductListAllCommand extends Command
{
    protected static $defaultName = 'project:graber:parse:product:list:all';

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
        $command = new ParseProductListAll();
        if (OutputInterface::VERBOSITY_NORMAL !== $output->getVerbosity()) {
            $progressBar = new ProgressBar($output);

            $command->setOnStartProduct(static fn(int $max) => $progressBar->setProductTotal($max));
            $command->setOnStartCategory(static fn(int $max) => $progressBar->setCategoryTotal($max));
            $command->setOnSetProductProgress(static fn(int $step) => $progressBar->setProductCurrent($step));
            $command->setOnSetCategoryProgress(static fn(int $step) => $progressBar->setCategoryCurrent($step));
        }

        $this->commandBus->execute($command);

        return self::SUCCESS;
    }
}