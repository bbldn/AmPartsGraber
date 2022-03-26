<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\CustomField;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method CustomField[]    findAll()
 * @method CustomField|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomField|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomField[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<CustomField>   findAll()
 * @psalm-method list<CustomField>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<CustomField>
 */
class CustomFieldRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, CustomField::class);
    }
}