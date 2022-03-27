<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductProvider;

use App\Domain\Common\Domain\Entity\Base\Front\Product as ProductFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Product as ProductGraber;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductProvider\Repository\Front\ProductRepository as ProductFrontRepository;

class Provider
{
    private ProductFrontRepository $productFrontRepository;

    /**
     * @param ProductFrontRepository $productFrontRepository
     */
    public function __construct(ProductFrontRepository $productFrontRepository)
    {
        $this->productFrontRepository = $productFrontRepository;
    }

    /**
     * @param ProductGraber $productGraber
     * @return ProductFront|null
     */
    public function getProductFrontByProductGraber(ProductGraber $productGraber): ?ProductFront
    {
        return $this->productFrontRepository->findOneByModel((string)$productGraber->getCode());
    }
}