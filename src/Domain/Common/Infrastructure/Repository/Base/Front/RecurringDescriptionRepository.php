<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\RecurringDescription;

/**
 * @method RecurringDescription[]    findAll()
 * @method RecurringDescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecurringDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecurringDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<RecurringDescription>   findAll()
 * @psalm-method list<RecurringDescription>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<RecurringDescription>
 */
class RecurringDescriptionRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, RecurringDescription::class);
    }
}