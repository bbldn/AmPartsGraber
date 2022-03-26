<?php

namespace App\Domain\Common\Infrastructure\Repository;

use App\Domain\Common\Domain\Entity\Base\Graber\Product;
use App\Domain\Common\Infrastructure\Repository\Base\Graber\ProductRepository as Base;
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