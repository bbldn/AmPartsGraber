<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryDescriptionListSynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Category as CategoryGraber;
use App\Domain\Common\Application\Provider\LanguageProvider\Provider as LanguageProvider;
use App\Domain\Common\Domain\Entity\Base\Front\CategoryDescription as CategoryDescriptionFront;
use App\Domain\Common\Application\MultipleEntityManager\EntityManager as MultipleEntityManager;

class Synchronizer
{
    private LanguageProvider $languageProvider;

    private MultipleEntityManager $multipleEntityManager;

    /**
     * @param LanguageProvider $languageProvider
     * @param MultipleEntityManager $multipleEntityManager
     */
    public function __construct(
        LanguageProvider $languageProvider,
        MultipleEntityManager $multipleEntityManager
    )
    {
        $this->languageProvider = $languageProvider;
        $this->multipleEntityManager = $multipleEntityManager;
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
            $this->multipleEntityManager->removeFront($categoryDescriptionFront);
        }

        if (null === $mainCategoryDescription) {
            $languageFront = $this->languageProvider->getDefaultLanguageFront();

            $mainCategoryDescription = new CategoryDescriptionFront();
            $mainCategoryDescription->setCategory($categoryFront);
            $mainCategoryDescription->setLanguage($languageFront);
        }

        $mainCategoryDescription->setMetaH1('');
        $mainCategoryDescription->setMetaTitle('');
        $mainCategoryDescription->setDescription('');
        $mainCategoryDescription->setMetaKeyword('');
        $mainCategoryDescription->setMetaDescription('');
        $mainCategoryDescription->setName($categoryGraber->getName());

        $this->multipleEntityManager->persistFront($mainCategoryDescription);
    }
}