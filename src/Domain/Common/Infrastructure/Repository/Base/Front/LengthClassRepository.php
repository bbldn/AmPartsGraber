<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\LengthClass;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method LengthClass[]    findAll()
 * @method LengthClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method LengthClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method LengthClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<LengthClass>   findAll()
 * @psalm-method list<LengthClass>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<LengthClass>
 */
class LengthClassRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, LengthClass::class);
    }
}