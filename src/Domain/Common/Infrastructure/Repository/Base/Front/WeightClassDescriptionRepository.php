<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\WeightClassDescription;

/**
 * @method WeightClassDescription[]    findAll()
 * @method WeightClassDescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeightClassDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeightClassDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<WeightClassDescription>   findAll()
 * @psalm-method list<WeightClassDescription>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<WeightClassDescription>
 */
class WeightClassDescriptionRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, WeightClassDescription::class);
    }
}