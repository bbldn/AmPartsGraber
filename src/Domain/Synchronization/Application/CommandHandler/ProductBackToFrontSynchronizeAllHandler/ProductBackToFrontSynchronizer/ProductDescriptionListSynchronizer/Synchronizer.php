<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\ProductDescriptionListSynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\Product as ProductFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Product as ProductGraber;
use App\Domain\Common\Application\Provider\LanguageProvider\Provider as LanguageProvider;
use App\Domain\Common\Domain\Entity\Base\Front\ProductDescription as ProductDescriptionFront;

class Synchronizer
{
    private LanguageProvider $languageProvider;

    /**
     * @param LanguageProvider $languageProvider
     */
    public function __construct(LanguageProvider $languageProvider)
    {
        $this->languageProvider = $languageProvider;
    }

    /**
     * @param ProductFront $productFront
     * @param ProductGraber $productGraber
     * @return void
     */
    public function synchronize(ProductFront $productFront, ProductGraber $productGraber): void
    {
        $mainProductDescription = null;
        foreach ($productFront->getDescriptions() as $index => $productDescriptionFront) {
            $languageFront = $productDescriptionFront->getLanguage();
            if (true === $this->languageProvider->isDefaultLanguageFront($languageFront)) {
                $mainProductDescription = $productDescriptionFront;
                continue;
            }

            $productFront->getDescriptions()->remove($index);
        }

        if (null === $mainProductDescription) {
            $languageFront = $this->languageProvider->getDefaultLanguageFront();

            $mainProductDescription = new ProductDescriptionFront();
            $mainProductDescription->setProduct($productFront);
            $mainProductDescription->setLanguage($languageFront);

            $productFront->getDescriptions()->add($mainProductDescription);
        }

        $mainProductDescription->setMetaH1('');
        $mainProductDescription->setMetaTitle('');
        $mainProductDescription->setMetaKeyword('');
        $mainProductDescription->setMetaDescription('');
        $mainProductDescription->setName($productGraber->getName());
        $mainProductDescription->setDescription($productGraber->getDescription() ?? '');
    }
}