<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\CustomFieldValue;

/**
 * @method CustomFieldValue[]    findAll()
 * @method CustomFieldValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomFieldValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomFieldValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<CustomFieldValue>   findAll()
 * @psalm-method list<CustomFieldValue>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<CustomFieldValue>
 */
class CustomFieldValueRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, CustomFieldValue::class);
    }
}