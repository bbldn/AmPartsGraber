<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\SeoProSynchronizer\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\SeoUrl;

interface SeoUrlRepository
{
    /**
     * @param string $query
     * @return SeoUrl[]
     *
     * @psalm-return SeoUrl
     */
    public function findByQuery(string $query): array;
}