<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\TaxClass;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method TaxClass[]    findAll()
 * @method TaxClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<TaxClass>   findAll()
 * @psalm-method list<TaxClass>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<TaxClass>
 */
class TaxClassRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, TaxClass::class);
    }
}