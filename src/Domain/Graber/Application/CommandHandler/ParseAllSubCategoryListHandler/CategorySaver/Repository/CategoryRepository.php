<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseAllSubCategoryListHandler\CategorySaver\Repository;

use App\Domain\Common\Domain\Entity\Base\Graber\Category;

interface CategoryRepository
{
    /**
     * @param string $url
     * @return Category|null
     */
    public function findOneByUrl(string $url): ?Category;
}