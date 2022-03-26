<?php

namespace App\Domain\Common\Infrastructure\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\Language;
use App\Domain\Common\Infrastructure\Repository\Base\Front\LanguageRepository as Base;
use App\Domain\Common\Application\Provider\LanguageProvider\Repository\Front\LanguageRepository as LanguageRepositoryLanguageProvider;

class LanguageRepository extends Base implements LanguageRepositoryLanguageProvider
{
    /**
     * @param int $id
     * @return Language|null
     */
    public function findOne(int $id): ?Language
    {
        return $this->find($id);
    }
}