<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;
use App\Domain\Common\Domain\Entity\Base\Front\VoucherThemeDescription;

/**
 * @method VoucherThemeDescription[]    findAll()
 * @method VoucherThemeDescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method VoucherThemeDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method VoucherThemeDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<VoucherThemeDescription>   findAll()
 * @psalm-method list<VoucherThemeDescription>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<VoucherThemeDescription>
 */
class VoucherThemeDescriptionRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, VoucherThemeDescription::class);
    }
}