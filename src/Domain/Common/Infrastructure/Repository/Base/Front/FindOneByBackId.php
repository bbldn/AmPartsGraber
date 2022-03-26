<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Throwable;
use Psr\Log\LoggerInterface as Logger;

/**
 * @psalm-template T
 */
trait FindOneByBackId
{
    protected Logger $logger;

    /**
     * @param int $backId
     * @return mixed
     *
     * @psalm-return T|null
     */
    public function findOneByBackId(int $backId)
    {
        try {
            return $this->createQueryBuilder('a')
                ->andWhere('a.backId = :backId')
                ->setParameter('backId', $backId)
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (Throwable $e) {
            $this->logger->error($e);

            return null;
        }
    }
}