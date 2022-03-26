<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\City;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method City[]    findAll()
 * @method City|null find($id, $lockMode = null, $lockVersion = null)
 * @method City|null findOneBy(array $criteria, array $orderBy = null)
 * @method City[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<City>   findAll()
 * @psalm-method list<City>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<City>
 */
class CityRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, City::class);
    }
}