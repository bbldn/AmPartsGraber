<?php

namespace App\Domain\Common\Application\Provider\ShopProvider;

use App\Domain\Common\Domain\Entity\Base\Front\Shop as ShopFront;
use App\Domain\Common\Application\Provider\ShopProvider\Repository\Front\ShopRepository;

class Provider
{
    private ShopRepository $shopRepository;

    /**
     * @param ShopRepository $shopRepository
     */
    public function __construct(ShopRepository $shopRepository)
    {
        $this->shopRepository = $shopRepository;
    }

    /**
     * @return ShopFront
     */
    public function getDefaultShopFront(): ShopFront
    {
        /** @psalm-var ShopFront */
        return $this->shopRepository->findOne(0);
    }

    /**
     * @param ShopFront|null $shopFront
     * @return bool
     */
    public function isDefaultShopFront(?ShopFront $shopFront): bool
    {
        if (null === $shopFront) {
            return false;
        }

        return  $this->getDefaultShopFront()->getId() === $shopFront->getId();
    }
}