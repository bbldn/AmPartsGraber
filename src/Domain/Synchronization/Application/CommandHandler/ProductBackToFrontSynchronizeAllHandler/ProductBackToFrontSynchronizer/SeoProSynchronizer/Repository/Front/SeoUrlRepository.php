<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\SeoProSynchronizer\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\SeoUrl;

interface SeoUrlRepository
{
    /**
     * @param string $query
     * @return SeoUrl[]
     *
     * @psalm-return list<SeoUrl>
     */
    public function findByQuery(string $query): array;
}