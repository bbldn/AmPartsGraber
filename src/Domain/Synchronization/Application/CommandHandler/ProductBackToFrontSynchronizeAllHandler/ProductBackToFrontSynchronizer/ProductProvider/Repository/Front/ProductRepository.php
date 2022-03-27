<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductProvider\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\Product;

interface ProductRepository
{
    /**
     * @param string $model
     * @return Product|null
     */
    public function findOneByModel(string $model): ?Product;
}