<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductSynchronizer;

use DateTimeImmutable;
use App\Domain\Common\Domain\Entity\Base\Front\Product as ProductFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Product as ProductGraber;

class Synchronizer
{
    /**
     * @param ProductFront $productFront
     * @return DateTimeImmutable
     */
    private function getDateAvailable(ProductFront $productFront): DateTimeImmutable
    {
        $dateAvailable = new DateTimeImmutable('1970-01-01');
        $dateAvailableProduct = $productFront->getDateAvailable();

        if (null === $dateAvailableProduct) {
            return $dateAvailable;
        }

        $condition = $dateAvailable->format('c') === $dateAvailableProduct->format('c');

        return true === $condition ? $dateAvailableProduct: $dateAvailable;
    }

    /**
     * @param ProductGraber $productGraber
     * @return string
     */
    private function getImagePath(ProductGraber $productGraber): string
    {
        $imageUrl = $productGraber->getImageUrl();
        if (null === $imageUrl) {
            return '';
        }

        return '/catalog/products/' . basename($imageUrl);
    }

    /**
     * @param ProductFront $productFront
     * @param ProductGraber $productGraber
     * @return void
     */
    public function synchronize(ProductFront $productFront, ProductGraber $productGraber): void
    {
        $imagePath = $this->getImagePath($productGraber);
        $dateAvailable = $this->getDateAvailable($productFront);

        $productFront->setUpc('');
        $productFront->setEan('');
        $productFront->setJan('');
        $productFront->setMpn('');
        $productFront->setSku('');
        $productFront->setIsbn('');
        $productFront->setWidth(0);
        $productFront->setHeight(0);
        $productFront->setPoints(0);
        $productFront->setWeight(0);
        $productFront->setLength(0);
        $productFront->setViewed(0);
        $productFront->setLocation('');
        $productFront->setSortOrder(0);
        $productFront->setStatus(true);
        $productFront->setMinimum(true);
        $productFront->setShipping(true);
        $productFront->setTaxClass(null);
        $productFront->setSubtract(true);
        $productFront->setSubtract(false);
        $productFront->setQuantity(99999);
        $productFront->setImage($imagePath);
        $productFront->setLengthClass(null);
        $productFront->setWeightClass(null);
        $productFront->setStockStatus(null);
        $productFront->setManufacturer(null);
        $productFront->setDateAvailable($dateAvailable);
        $productFront->setModel($productGraber->getCode());
        $productFront->setPrice($productGraber->getPrice());
    }
}