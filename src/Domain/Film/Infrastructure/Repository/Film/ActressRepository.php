<?php

namespace App\Domain\Film\Infrastructure\Repository\Film;

use DateTimeImmutable;
use Doctrine\ORM\NonUniqueResultException;
use App\Domain\Common\Domain\Entity\Base\Film\Actress;
use App\Domain\Common\Infrastructure\Repository\Base\Film\ActressRepository as Base;
use App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\ActressSaver\Repository\Film\ActressRepository as ActressRepositoryActressSaver;

class ActressRepository extends Base implements ActressRepositoryActressSaver
{
    /**
     * @param string $fullName
     * @param DateTimeImmutable $dob
     * @return Actress|null
     */
    public function findOneByFullNameAndDob(string $fullName, DateTimeImmutable $dob): ?Actress
    {
        try {
            return $this->createQueryBuilder('a')
                ->andWhere('fullName', $fullName)
                ->andWhere('dob', $dob->format('Y-m-d'))
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
            $this->logger->error((string)$e);

            return null;
        }
    }
}