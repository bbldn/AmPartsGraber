<?php

namespace App\Domain\Common\Infrastructure\Repository\Base\Front;

use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Common\Domain\Entity\Base\Front\FileDescription;
use App\Domain\Common\Infrastructure\Repository\Base\Repository;

/**
 * @method FileDescription[]    findAll()
 * @method FileDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method FileDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<FileDescription>   findAll()
 * @psalm-method list<FileDescription>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<FileDescription>
 */
class FileDescriptionRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, FileDescription::class);
    }
}