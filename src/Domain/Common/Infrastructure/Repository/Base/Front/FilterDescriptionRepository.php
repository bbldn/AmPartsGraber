<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\FilterDescription;

/**
 * @method FilterDescription[]    findAll()
 * @method FilterDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method FilterDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<FilterDescription>   findAll()
 * @psalm-method list<FilterDescription>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<FilterDescription>
 */
class FilterDescriptionRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, FilterDescription::class);
    }
}