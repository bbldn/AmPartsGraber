<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductCategoryListSynchronizer\CategoryProvider\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\SeoUrl;

interface SeoUrlRepository
{
    /**
     * @param string $keyword
     * @return SeoUrl|null
     */
    public function findOneByKeyword(string $keyword): ?SeoUrl;
}