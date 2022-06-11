<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface as EntityManagerFilm;
use App\Domain\Common\Infrastructure\Repository\Base\Film\ActressRepository;

class TinkerCommand extends Command
{
    protected static $defaultName = 'tinker';

    private ActressRepository $actressRepository;

    private EntityManagerFilm $entityManagerFilm;

    public function __construct(
        ActressRepository $actressRepository,
        EntityManagerFilm $entityManagerFilm
    )
    {
        parent::__construct();
        $this->actressRepository = $actressRepository;
        $this->entityManagerFilm = $entityManagerFilm;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $keys = file_get_contents('/home/user/Рабочий стол/result.json');
        $keys = json_decode($keys, true);

        $actressList = $this->actressRepository->findAll();
        foreach ($actressList as $actress) {
            $piercing = $actress->getPiercing();
            foreach (explode(';', $piercing) as $item1) {
                foreach (explode(',', $item1) as $item) {
                    $item = trim($item);
                    $item = mb_strtolower($item);

                    if (false === key_exists($item, $keys)) {
                        continue;
                    }

                    $actressPiercing = $actress->getActressPiercing();
                    foreach ($keys[$item] as $method) {
                        call_user_func([$actressPiercing, $method], true);
                    }
                }
            }
        }

        $this->entityManagerFilm->flush();

        return self::SUCCESS;
    }
}