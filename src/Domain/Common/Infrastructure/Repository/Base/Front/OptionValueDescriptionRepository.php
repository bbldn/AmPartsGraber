<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\OptionValueDescription;

/**
 * @method OptionValueDescription[]    findAll()
 * @method OptionValueDescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method OptionValueDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method OptionValueDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<OptionValueDescription>   findAll()
 * @psalm-method list<OptionValueDescription>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<OptionValueDescription>
 */
class OptionValueDescriptionRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, OptionValueDescription::class);
    }
}