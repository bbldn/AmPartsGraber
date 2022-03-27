<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\Repository\Graber;

use App\Domain\Common\Domain\Entity\Base\Graber\Product;

interface ProductRepository
{
    /**
     * @return Product[]
     *
     * @psalm-return list<Product>
     *
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function findAll();
}