<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\FilterGroupDescription;

/**
 * @method FilterGroupDescription[]    findAll()
 * @method FilterGroupDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method FilterGroupDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<FilterGroupDescription>   findAll()
 * @psalm-method list<FilterGroupDescription>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<FilterGroupDescription>
 */
class FilterGroupDescriptionRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, FilterGroupDescription::class);
    }
}