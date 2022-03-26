<?php

namespace App\Domain\Synchronization\Infrastructure\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\SeoUrl;
use App\Domain\Common\Infrastructure\Repository\Base\Front\SeoUrlRepository as Base;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\SeoProSynchronizer\Repository\Front\SeoUrlRepository as SeoUrlRepositorySeoProSynchronizer;

class SeoUrlRepository extends Base implements SeoUrlRepositorySeoProSynchronizer
{
    /**
     * @param string $query
     * @return SeoUrl[]
     *
     * @psalm-return list<SeoUrl>
     */
    public function findByQuery(string $query): array
    {
        return $this->findBy(['query' => $query]);
    }
}