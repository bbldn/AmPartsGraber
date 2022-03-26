<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\OrderStatus;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method OrderStatus[]    findAll()
 * @method OrderStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<OrderStatus>   findAll()
 * @psalm-method list<OrderStatus>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<OrderStatus>
 */
class OrderStatusRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, OrderStatus::class);
    }
}