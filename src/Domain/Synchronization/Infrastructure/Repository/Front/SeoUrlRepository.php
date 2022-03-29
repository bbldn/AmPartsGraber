<?php

namespace App\Domain\Synchronization\Infrastructure\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\SeoUrl;
use App\Domain\Common\Infrastructure\Repository\Base\Front\SeoUrlRepository as Base;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\SeoProSynchronizer\Repository\Front\SeoUrlRepository as SeoUrlRepositorySeoProSynchronizerProductBackToFrontSynchronizer;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\SeoProSynchronizer\Repository\Front\SeoUrlRepository as SeoUrlRepositorySeoProSynchronizerCategoryBackToFrontSynchronizer;

class SeoUrlRepository extends Base implements
    SeoUrlRepositorySeoProSynchronizerProductBackToFrontSynchronizer,
    SeoUrlRepositorySeoProSynchronizerCategoryBackToFrontSynchronizer
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