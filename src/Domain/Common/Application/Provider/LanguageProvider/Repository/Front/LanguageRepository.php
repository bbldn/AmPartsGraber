<?php

namespace App\Domain\Common\Application\Provider\LanguageProvider\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\Language;

interface LanguageRepository
{
    /**
     * @param int $id
     * @return Language|null
     */
    public function findOne(int $id): ?Language;
}