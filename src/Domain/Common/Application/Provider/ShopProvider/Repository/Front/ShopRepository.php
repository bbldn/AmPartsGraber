<?php

namespace App\Domain\Common\Application\Provider\ShopProvider\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\Shop;

interface ShopRepository
{
    /**
     * @param int $id
     * @return Shop|null
     */
    public function findOne(int $id): ?Shop;
}