<?php

namespace App\Domain\Graber\Infrastructure\Repository;

use App\Domain\Graber\Domain\Entity\Product;
use App\Domain\Graber\Infrastructure\Repository\Base\ProductRepository as Base;
use App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductSaver\Repository\ProductRepository as ProductRepositoryProductSaver;

class ProductRepository extends Base implements ProductRepositoryProductSaver
{
    /**
     * @param string $code
     * @return Product|null
     */
    public function findOneByCode(string $code): ?Product
    {
        return $this->findOneBy(['code' => $code]);
    }
}