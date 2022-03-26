<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\Product;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method Product[]    findAll()
 * @method Product|null findOneByBackId(int $backId)
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<Product>   findAll()
 * @psalm-method list<Product>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<Product>
 */
class ProductRepository extends Repository
{
    /**
     * @use FindOneByBackId<Product>
     */
    use FindOneByBackId;

    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, Product::class);
    }
}