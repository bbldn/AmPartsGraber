<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Domain\Common\Infrastructure\Repository\Base\Film\ActressRepository;

class TinkerCommand extends Command
{
    protected static $defaultName = 'tinker';

    private ActressRepository $actressRepository;

    public function __construct(ActressRepository $actressRepository)
    {
        parent::__construct();
        $this->actressRepository = $actressRepository;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $result = [];
        $actressList = $this->actressRepository->findAll();
        foreach ($actressList as $actress) {
            $piercing = $actress->getPiercing();
            foreach (explode(';', $piercing) as $item1) {
                foreach (explode(',', $item1) as $item) {
                    $item = trim($item);
                    $item = mb_strtolower($item);
                    if (false === key_exists($item, $result)) {
                        $result[$item] = 1;
                    } else {
                        $result[$item]++;
                    }
                }
            }
        }

        dump($result);

        return self::SUCCESS;
    }
}