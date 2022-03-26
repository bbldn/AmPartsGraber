<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\CategoryToLayout;

/**
 * @method CategoryToLayout[]    findAll()
 * @method CategoryToLayout|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryToLayout[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<CategoryToLayout>   findAll()
 * @psalm-method list<CategoryToLayout>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<CategoryToLayout>
 */
class CategoryToLayoutRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, CategoryToLayout::class);
    }
}