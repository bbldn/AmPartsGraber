<?php

namespace App\Domain\Graber\Infrastructure\Repository\Base;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Graber\Domain\Entity\Product;

/**
 * @method Product[]    findAll()
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<Product>    findAll()
 * @psalm-method list<Product>    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<Product>
 */
class ProductRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, Product::class);
    }
}