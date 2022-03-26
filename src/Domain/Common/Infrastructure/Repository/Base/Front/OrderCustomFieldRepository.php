<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\OrderCustomField;

/**
 * @method OrderCustomField[]    findAll()
 * @method OrderCustomField|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderCustomField|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderCustomField[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<OrderCustomField>   findAll()
 * @psalm-method list<OrderCustomField>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<OrderCustomField>
 */
class OrderCustomFieldRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, OrderCustomField::class);
    }
}