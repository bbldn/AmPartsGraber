<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\Repository\Graber;

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