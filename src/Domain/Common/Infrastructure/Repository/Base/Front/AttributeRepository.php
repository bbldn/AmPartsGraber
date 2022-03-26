<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\Attribute;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method Attribute[]    findAll()
 * @method Attribute|null find($id, $lockMode = null, $lockVersion = null)
 * @method Attribute|null findOneBy(array $criteria, array $orderBy = null)
 * @method Attribute[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<Attribute>   findAll()
 * @psalm-method list<Attribute>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<Attribute>
 */
class AttributeRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, Attribute::class);
    }
}