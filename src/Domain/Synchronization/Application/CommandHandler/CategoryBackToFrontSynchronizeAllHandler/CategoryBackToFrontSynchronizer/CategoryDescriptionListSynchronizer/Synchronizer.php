<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryDescriptionListSynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Category as CategoryGraber;
use App\Domain\Common\Application\Provider\LanguageProvider\Provider as LanguageProvider;
use App\Domain\Common\Domain\Entity\Base\Front\CategoryDescription as CategoryDescriptionFront;

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
     * @param CategoryFront $categoryFront
     * @param CategoryGraber $categoryGraber
     * @return void
     */
    public function synchronize(CategoryFront $categoryFront, CategoryGraber $categoryGraber): void
    {
        $mainCategoryDescription = null;
        foreach ($categoryFront->getDescriptions() as $index => $categoryDescriptionFront) {
            $languageFront = $categoryDescriptionFront->getLanguage();
            if (true === $this->languageProvider->isDefaultLanguageFront($languageFront)) {
                $mainCategoryDescription = $categoryDescriptionFront;
                continue;
            }

            $categoryFront->getDescriptions()->remove($index);
        }

        if (null === $mainCategoryDescription) {
            $languageFront = $this->languageProvider->getDefaultLanguageFront();

            $mainCategoryDescription = new CategoryDescriptionFront();
            $mainCategoryDescription->setCategory($categoryFront);
            $mainCategoryDescription->setLanguage($languageFront);

            $categoryFront->getDescriptions()->add($mainCategoryDescription);
        }

        $mainCategoryDescription->setMetaH1('');
        $mainCategoryDescription->setMetaTitle('');
        $mainCategoryDescription->setDescription('');
        $mainCategoryDescription->setMetaKeyword('');
        $mainCategoryDescription->setMetaDescription('');
        $mainCategoryDescription->setName($categoryGraber->getName());
    }
}