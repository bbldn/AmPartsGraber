<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseAllSubCategoryListHandler\CategorySaver\Repository;

use App\Domain\Graber\Domain\Entity\Category;

interface CategoryRepository
{
    /**
     * @param string $url
     * @return Category|null
     */
    public function findOneByUrl(string $url): ?Category;
}