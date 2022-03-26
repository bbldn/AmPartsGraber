<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\ProductDiscontinued;

/**
 * @method ProductDiscontinued[]    findAll()
 * @method ProductDiscontinued|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductDiscontinued|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductDiscontinued[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<ProductDiscontinued>   findAll()
 * @psalm-method list<ProductDiscontinued>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<ProductDiscontinued>
 */
class ProductDiscontinuedRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, ProductDiscontinued::class);
    }
}