<?php

namespace App\Domain\Film\Infrastructure\Command;

use BBLDN\CQRS\CommandBus\CommandBus;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Domain\Film\Application\Command\ParseByCategoryUrl;

class ParseByCategoryCommand extends Command
{
    protected static $defaultName = 'project:films:parse:by-category:all';

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
     * @return void
     */
    protected function configure(): void
    {
        $this->addArgument('url', InputArgument::REQUIRED);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $command = new ParseByCategoryUrl($input->getArgument('url'));
        $this->commandBus->execute($command);

        return self::SUCCESS;
    }
}