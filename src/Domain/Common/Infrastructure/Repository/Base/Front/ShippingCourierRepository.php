<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\ShippingCourier;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method ShippingCourier[]    findAll()
 * @method ShippingCourier|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShippingCourier|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShippingCourier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<ShippingCourier>   findAll()
 * @psalm-method list<ShippingCourier>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<ShippingCourier>
 */
class ShippingCourierRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, ShippingCourier::class);
    }
}