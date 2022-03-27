<?php

namespace App\Domain\Synchronization\Infrastructure\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\SeoUrl;
use App\Domain\Common\Infrastructure\Repository\Base\Front\SeoUrlRepository as Base;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\SeoProSynchronizer\Repository\Front\SeoUrlRepository as SeoUrlRepositorySeoProSynchronizer;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductCategoryListSynchronizer\CategoryProvider\Repository\Front\SeoUrlRepository as SeoUrlRepositoryCategoryProvider;

class SeoUrlRepository extends Base implements SeoUrlRepositoryCategoryProvider, SeoUrlRepositorySeoProSynchronizer
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

    /**
     * @param string $keyword
     * @return SeoUrl|null
     */
    public function findOneByKeyword(string $keyword): ?SeoUrl
    {
        return $this->findOneBy(['keyword' => $keyword]);
    }
}