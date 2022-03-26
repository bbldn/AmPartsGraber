<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\OptionDescription;

/**
 * @method OptionDescription[]    findAll()
 * @method OptionDescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method OptionDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method OptionDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<OptionDescription>   findAll()
 * @psalm-method list<OptionDescription>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<OptionDescription>
 */
class OptionDescriptionRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, OptionDescription::class);
    }
}