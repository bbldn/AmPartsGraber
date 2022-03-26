<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\ProductSpecial;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method ProductSpecial[]    findAll()
 * @method ProductSpecial|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductSpecial|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductSpecial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<ProductSpecial>   findAll()
 * @psalm-method list<ProductSpecial>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<ProductSpecial>
 */
class ProductSpecialRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, ProductSpecial::class);
    }
}