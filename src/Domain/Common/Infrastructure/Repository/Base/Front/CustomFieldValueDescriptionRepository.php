<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\CustomFieldValueDescription;

/**
 * @method CustomFieldValueDescription[]    findAll()
 * @method CustomFieldValueDescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomFieldValueDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomFieldValueDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<CustomFieldValueDescription>   findAll()
 * @psalm-method list<CustomFieldValueDescription>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<CustomFieldValueDescription>
 */
class CustomFieldValueDescriptionRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, CustomFieldValueDescription::class);
    }
}