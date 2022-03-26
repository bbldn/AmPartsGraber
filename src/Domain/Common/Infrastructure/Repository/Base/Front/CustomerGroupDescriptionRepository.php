<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\CustomerGroupDescription;

/**
 * @method CustomerGroupDescription[]    findAll()
 * @method CustomerGroupDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerGroupDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<CustomerGroupDescription>   findAll()
 * @psalm-method list<CustomerGroupDescription>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<CustomerGroupDescription>
 */
class CustomerGroupDescriptionRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, CustomerGroupDescription::class);
    }
}