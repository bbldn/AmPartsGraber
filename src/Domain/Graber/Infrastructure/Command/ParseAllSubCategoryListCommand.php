<?php

namespace App\Domain\Graber\Infrastructure\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Domain\Common\Application\CommandBus\CommandBus;
use App\Domain\Graber\Application\Command\ParseAllSubCategoryList;

class ParseAllSubCategoryListCommand extends Command
{
    protected static $defaultName = 'project:parse:subcategory:list:all';

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
        $progressBar = new ProgressBar($output);

        /** @psalm-suppress MissingClosureReturnType */
        $onParsedCategory = fn() => $progressBar->advance();

        $command = new ParseAllSubCategoryList('/katalog/audi', $onParsedCategory);
        $this->commandBus->execute($command);

        $progressBar->finish();

        $output->write(PHP_EOL);

        return self::SUCCESS;
    }
}