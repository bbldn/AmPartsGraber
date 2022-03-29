<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Throwable;
use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\PaymentMethod;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method PaymentMethod[]    findAll()
 * @method PaymentMethod|null find($id, $lockMode = null, $lockVersion = null)
 * @method PaymentMethod|null findOneBy(array $criteria, array $orderBy = null)
 * @method PaymentMethod[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<PaymentMethod>   findAll()
 * @psalm-method list<PaymentMethod>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<PaymentMethod>
 */
class PaymentMethodRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, PaymentMethod::class);
    }

    /**
     * @param string|null $frontCode
     * @return PaymentMethod|null
     */
    public function findOneByFrontCode(?string $frontCode): ?PaymentMethod
    {
        if (null === $frontCode) {
            return null;
        }

        try {
            return $this->createQueryBuilder('pm')
                ->andWhere('pm.frontCode = :frontCode')
                ->setParameter('frontCode', $frontCode)
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (Throwable $e) {
            /** @var string $e */
            $this->logger->error($e);

            return null;
        }
    }
}