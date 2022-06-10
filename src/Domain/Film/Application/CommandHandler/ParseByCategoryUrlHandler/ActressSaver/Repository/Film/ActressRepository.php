<?php

namespace App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\ActressSaver\Repository\Film;

use DateTimeImmutable;
use App\Domain\Common\Domain\Entity\Base\Film\Actress;

interface ActressRepository
{
    /**
     * @param string $fullName
     * @param DateTimeImmutable $dob
     * @return Actress|null
     */
    public function findOneByFullNameAndDob(string $fullName, DateTimeImmutable $dob): ?Actress;
}