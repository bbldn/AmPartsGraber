<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\Repository;

use App\Domain\Graber\Domain\Entity\Category;

interface CategoryRepository
{
    /**
     * @return Category[]
     *
     * @psalm-return list<Category>
     *
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function findAll();
}