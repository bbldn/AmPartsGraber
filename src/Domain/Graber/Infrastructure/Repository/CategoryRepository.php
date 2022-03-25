<?php

namespace App\Domain\Graber\Infrastructure\Repository;

use App\Domain\Graber\Domain\Entity\Category;
use App\Domain\Graber\Infrastructure\Repository\Base\CategoryRepository as Base;
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