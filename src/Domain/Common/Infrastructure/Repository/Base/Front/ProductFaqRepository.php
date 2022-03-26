<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\ProductFaq;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method ProductFaq[]    findAll()
 * @method ProductFaq|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductFaq|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductFaq[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<ProductFaq>   findAll()
 * @psalm-method list<ProductFaq>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<ProductFaq>
 */
class ProductFaqRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, ProductFaq::class);
    }
}