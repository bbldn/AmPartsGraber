<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\VoucherTheme;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method VoucherTheme[]    findAll()
 * @method VoucherTheme|null find($id, $lockMode = null, $lockVersion = null)
 * @method VoucherTheme|null findOneBy(array $criteria, array $orderBy = null)
 * @method VoucherTheme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<VoucherTheme>   findAll()
 * @psalm-method list<VoucherTheme>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<VoucherTheme>
 */
class VoucherThemeRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, VoucherTheme::class);
    }
}