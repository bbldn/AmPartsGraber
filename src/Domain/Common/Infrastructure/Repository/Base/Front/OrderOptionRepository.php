<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\OrderOption;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method OrderOption[]    findAll()
 * @method OrderOption|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderOption|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderOption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<OrderOption>   findAll()
 * @psalm-method list<OrderOption>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<OrderOption>
 */
class OrderOptionRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, OrderOption::class);
    }
}