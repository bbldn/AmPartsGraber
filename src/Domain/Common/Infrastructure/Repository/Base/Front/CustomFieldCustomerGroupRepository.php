<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\CustomFieldCustomerGroup;

/**
 * @method CustomFieldCustomerGroup[]    findAll()
 * @method CustomFieldCustomerGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomFieldCustomerGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomFieldCustomerGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<CustomFieldCustomerGroup>   findAll()
 * @psalm-method list<CustomFieldCustomerGroup>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<CustomFieldCustomerGroup>
 */
class CustomFieldCustomerGroupRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, CustomFieldCustomerGroup::class);
    }
}