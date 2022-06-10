<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Film;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Film\Actress;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method Actress[]    findAll()
 * @method Actress|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actress|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<Actress>   findAll()
 * @psalm-method list<Actress>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<Actress>
 */
class ActressRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, Actress::class);
    }
}