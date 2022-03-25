<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use App\Domain\Common\Application\CommandBus\CommandBus;
use App\Domain\Graber\Application\Command\ParseProductListAll;

class TinkerCommand extends Command
{
    protected static $defaultName = 'tinker';

    private CommandBus $commandBus;

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

        $categoryProgressBar = new ProgressBar($output->section());
        $categoryProgressBar->setFormat('%current%/%max% [%bar%] %percent% %elapsed%');
        $categoryProgressBar->start();

        $productProgressBar = new ProgressBar($output->section());
        $productProgressBar->setFormat('%current%/%max% [%bar%] %percent% %memory%');
        $productProgressBar->start();

        $command = new ParseProductListAll();
        $command->setOnHandledProduct(static fn() => $productProgressBar->advance());
        $command->setOnHandledCategory(static fn() => $categoryProgressBar->advance());
        $command->setOnReceivedProductList(static fn(int $number) => $productProgressBar->start($number));
        $command->setOnReceivedCategoryList(static fn(int $number) => $categoryProgressBar->start($number));

        $this->commandBus->execute($command);

        $productProgressBar->finish();
        $categoryProgressBar->finish();

        $output->write(PHP_EOL);

        return self::SUCCESS;
    }
}