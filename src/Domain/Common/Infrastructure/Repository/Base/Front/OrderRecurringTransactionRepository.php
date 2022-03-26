<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\OrderRecurringTransaction;

/**
 * @method OrderRecurringTransaction[]    findAll()
 * @method OrderRecurringTransaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderRecurringTransaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderRecurringTransaction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<OrderRecurringTransaction>   findAll()
 * @psalm-method list<OrderRecurringTransaction>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<OrderRecurringTransaction>
 */
class OrderRecurringTransactionRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, OrderRecurringTransaction::class);
    }
}