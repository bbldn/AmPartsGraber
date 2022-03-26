<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\Order;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method Order[]    findAll()
 * @method Order|null findOneByBackId(int $backId)
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<Order>   findAll()
 * @psalm-method list<Order>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<Order>
 */
class OrderRepository extends Repository
{
    /**
     * @use FindOneByBackId<Order>
     */
    use FindOneByBackId;

    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, Order::class);
    }
}