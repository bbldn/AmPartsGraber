<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\CustomerGroup;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method CustomerGroup[]    findAll()
 * @method CustomerGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<CustomerGroup>   findAll()
 * @psalm-method list<CustomerGroup>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<CustomerGroup>
 */
class CustomerGroupRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, CustomerGroup::class);
    }
}