<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductSaver\Repository;

use App\Domain\Graber\Domain\Entity\Product;

interface ProductRepository
{
    /**
     * @param string $code
     * @return Product|null
     */
    public function findOneByCode(string $code): ?Product;
}