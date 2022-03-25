<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\SessionManager\SessionManagerFacade;

class TinkerCommand extends Command
{
    protected static $defaultName = 'tinker';

    private SessionManagerFacade $sessionManagerFacade;

    public function __construct(SessionManagerFacade $sessionManagerFacade)
    {
        parent::__construct();
        $this->sessionManagerFacade = $sessionManagerFacade;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->sessionManagerFacade->setCategoryIndex(0)->setProductIndex(0);

        return self::SUCCESS;
    }
}