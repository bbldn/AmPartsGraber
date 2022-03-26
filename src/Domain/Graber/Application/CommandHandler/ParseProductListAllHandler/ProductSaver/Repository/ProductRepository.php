<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductSaver\Repository;

use App\Domain\Common\Domain\Entity\Base\Graber\Product;

interface ProductRepository
{
    /**
     * @param string $code
     * @return Product|null
     */
    public function findOneByCode(string $code): ?Product;
}