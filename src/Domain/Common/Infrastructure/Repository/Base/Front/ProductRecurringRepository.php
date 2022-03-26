<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\ProductRecurring;

/**
 * @method ProductRecurring[]    findAll()
 * @method ProductRecurring|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductRecurring|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductRecurring[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<ProductRecurring>   findAll()
 * @psalm-method list<ProductRecurring>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<ProductRecurring>
 */
class ProductRecurringRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, ProductRecurring::class);
    }
}