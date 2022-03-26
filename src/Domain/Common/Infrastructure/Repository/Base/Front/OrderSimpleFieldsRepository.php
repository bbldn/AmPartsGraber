<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\OrderSimpleFields;

/**
 * @method OrderSimpleFields[]    findAll()
 * @method OrderSimpleFields|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderSimpleFields|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderSimpleFields[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<OrderSimpleFields>   findAll()
 * @psalm-method list<OrderSimpleFields>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<OrderSimpleFields>
 */
class OrderSimpleFieldsRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, OrderSimpleFields::class);
    }
}