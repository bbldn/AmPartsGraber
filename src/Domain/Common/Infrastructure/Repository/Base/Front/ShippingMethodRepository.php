<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Throwable;
use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\ShippingMethod;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method ShippingMethod[]    findAll()
 * @method ShippingMethod|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShippingMethod|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShippingMethod[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<ShippingMethod>   findAll()
 * @psalm-method list<ShippingMethod>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<ShippingMethod>
 */
class ShippingMethodRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, ShippingMethod::class);
    }

    /**
     * @param int|null $backId
     * @return ShippingMethod|null
     */
    public function findOneByBackId(?int $backId): ?ShippingMethod
    {
        if (null === $backId) {
            return null;
        }

        try {
            return $this->createQueryBuilder('sm')
                ->andWhere('sm.backId = :backId')
                ->setParameter('backId', $backId)
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (Throwable $e) {
            $this->logger->error($e);

            return null;
        }
    }

    /**
     * @param string|null $frontCode
     * @return ShippingMethod|null
     */
    public function findOneByFrontCode(?string $frontCode): ?ShippingMethod
    {
        if (null === $frontCode) {
            return null;
        }

        try {
            return $this->createQueryBuilder('sm')
                ->andWhere('sm.frontCode = :frontCode')
                ->setParameter('frontCode', $frontCode)
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (Throwable $e) {
            $this->logger->error($e);

            return null;
        }
    }
}