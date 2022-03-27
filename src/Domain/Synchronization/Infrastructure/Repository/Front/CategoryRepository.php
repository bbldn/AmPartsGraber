<?php

namespace App\Domain\Synchronization\Infrastructure\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\Category;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CategoryRepository as Base;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductCategoryListSynchronizer\CategoryProvider\Repository\Front\CategoryRepository as CategoryRepositoryCategoryProvider;

class CategoryRepository extends Base implements CategoryRepositoryCategoryProvider
{
    /**
     * @param string $vendorCode
     * @return Category|null
     */
    public function findOneByVendorCode(string $vendorCode): ?Category
    {
        return $this->findOneBy(['vendorCode' => $vendorCode]);
    }
}