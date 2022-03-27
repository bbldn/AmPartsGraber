<?php

namespace App\Domain\Synchronization\Infrastructure\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\Product;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductRepository as Base;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductProvider\Repository\Front\ProductRepository as ProductRepositoryProductProvider;

class ProductRepository extends Base implements ProductRepositoryProductProvider
{
    /**
     * @param string $model
     * @return Product|null
     */
    public function findOneByModel(string $model): ?Product
    {
        return $this->findOneBy(['model' => $model]);
    }
}