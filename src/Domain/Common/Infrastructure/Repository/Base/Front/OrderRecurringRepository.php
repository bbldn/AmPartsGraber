<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\OrderRecurring;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method OrderRecurring[]    findAll()
 * @method OrderRecurring|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderRecurring|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderRecurring[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<OrderRecurring>   findAll()
 * @psalm-method list<OrderRecurring>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<OrderRecurring>
 */
class OrderRecurringRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, OrderRecurring::class);
    }
}