<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\CategoryFaq;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method CategoryFaq[]    findAll()
 * @method CategoryFaq|null findOneByBackId(int $backId)
 * @method CategoryFaq|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryFaq[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<CategoryFaq>   findAll()
 * @psalm-method list<CategoryFaq>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<CategoryFaq>
 */
class CategoryFaqRepository extends Repository
{
    /**
     * @use FindOneByBackId<CategoryFaq>
     */
    use FindOneByBackId;

    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, CategoryFaq::class);
    }
}