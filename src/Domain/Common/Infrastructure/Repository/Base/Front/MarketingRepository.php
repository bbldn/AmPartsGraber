<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\Marketing;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method Marketing[]    findAll()
 * @method Marketing|null find($id, $lockMode = null, $lockVersion = null)
 * @method Marketing|null findOneBy(array $criteria, array $orderBy = null)
 * @method Marketing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<Marketing>   findAll()
 * @psalm-method list<Marketing>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<Marketing>
 */
class MarketingRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, Marketing::class);
    }
}