<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\Manufacturer;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method Manufacturer[]    findAll()
 * @method Manufacturer|null findOneByBackId(int $backId)
 * @method Manufacturer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Manufacturer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Manufacturer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<Manufacturer>   findAll()
 * @psalm-method list<Manufacturer>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<Manufacturer>
 */
class ManufacturerRepository extends Repository
{
    /**
     * @use FindOneByBackId<Manufacturer>
     */
    use FindOneByBackId;

    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, Manufacturer::class);
    }
}