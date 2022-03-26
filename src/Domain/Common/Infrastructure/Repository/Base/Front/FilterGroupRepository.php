<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\FilterGroup;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method FilterGroup[]    findAll()
 * @method FilterGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method FilterGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method FilterGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<FilterGroup>   findAll()
 * @psalm-method list<FilterGroup>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<FilterGroup>
 */
class FilterGroupRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, FilterGroup::class);
    }
}