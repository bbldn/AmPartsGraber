<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\StockStatus;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method StockStatus[]    findAll()
 * @method StockStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method StockStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<StockStatus>   findAll()
 * @psalm-method list<StockStatus>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<StockStatus>
 */
class StockStatusRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, StockStatus::class);
    }
}