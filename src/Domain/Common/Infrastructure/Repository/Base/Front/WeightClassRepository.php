<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\WeightClass;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method WeightClass[]    findAll()
 * @method WeightClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeightClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeightClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<WeightClass>   findAll()
 * @psalm-method list<WeightClass>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<WeightClass>
 */
class WeightClassRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, WeightClass::class);
    }
}