<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\ManufacturerFaq;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method ManufacturerFaq[]    findAll()
 * @method ManufacturerFaq|null find($id, $lockMode = null, $lockVersion = null)
 * @method ManufacturerFaq|null findOneBy(array $criteria, array $orderBy = null)
 * @method ManufacturerFaq[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<ManufacturerFaq>   findAll()
 * @psalm-method list<ManufacturerFaq>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<ManufacturerFaq>
 */
class ManufacturerFaqRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, ManufacturerFaq::class);
    }
}