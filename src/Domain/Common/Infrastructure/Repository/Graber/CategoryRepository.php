<?php

namespace App\Domain\Common\Infrastructure\Repository\Graber;

use App\Domain\Common\Domain\Entity\Base\Graber\Category;
use App\Domain\Common\Infrastructure\Repository\Base\Graber\CategoryRepository as Base;
use App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\Repository\CategoryRepository as CategoryRepositoryParseProductListAllHandler;
use App\Domain\Graber\Application\CommandHandler\ParseAllSubCategoryListHandler\CategorySaver\Repository\CategoryRepository as CategoryRepositoryCategorySaver;

class CategoryRepository extends Base implements
    CategoryRepositoryCategorySaver,
    CategoryRepositoryParseProductListAllHandler
{
    /**
     * @param string $url
     * @return Category|null
     */
    public function findOneByUrl(string $url): ?Category
    {
        return $this->findOneBy(['url' => $url]);
    }
}