<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\OptionValue;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method OptionValue[]    findAll()
 * @method OptionValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method OptionValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method OptionValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<OptionValue>   findAll()
 * @psalm-method list<OptionValue>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<OptionValue>
 */
class OptionValueRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, OptionValue::class);
    }
}