<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\CustomFieldDescription;

/**
 * @method CustomFieldDescription[]    findAll()
 * @method CustomFieldDescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomFieldDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomFieldDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<CustomFieldDescription>   findAll()
 * @psalm-method list<CustomFieldDescription>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<CustomFieldDescription>
 */
class CustomFieldDescriptionRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, CustomFieldDescription::class);
    }
}