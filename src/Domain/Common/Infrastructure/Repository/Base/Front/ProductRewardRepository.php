<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\ProductReward;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method ProductReward[]    findAll()
 * @method ProductReward|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductReward|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductReward[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<ProductReward>   findAll()
 * @psalm-method list<ProductReward>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<ProductReward>
 */
class ProductRewardRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, ProductReward::class);
    }
}