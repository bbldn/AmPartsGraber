<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\AttributeGroup;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method AttributeGroup[]    findAll()
 * @method AttributeGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttributeGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttributeGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<AttributeGroup>   findAll()
 * @psalm-method list<AttributeGroup>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<AttributeGroup>
 */
class AttributeGroupRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, AttributeGroup::class);
    }
}