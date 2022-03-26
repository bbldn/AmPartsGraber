<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\Repository;

use App\Domain\Common\Domain\Entity\Base\Graber\Category;

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