<?php

namespace App\Domain\Common\Application\Provider\LanguageProvider;

use App\Domain\Common\Domain\Entity\Base\Front\Language as LanguageFront;
use App\Domain\Common\Application\Provider\LanguageProvider\Repository\Front\LanguageRepository as LanguageFrontRepository;

class Provider
{
    private LanguageFrontRepository $languageFrontRepository;

    /**
     * @param LanguageFrontRepository $languageFrontRepository
     */
    public function __construct(LanguageFrontRepository $languageFrontRepository)
    {
        $this->languageFrontRepository = $languageFrontRepository;
    }

    /**
     * @return LanguageFront
     */
    public function getDefaultLanguageFront(): LanguageFront
    {
        /** @psalm-var LanguageFront */
        return $this->languageFrontRepository->findOne(1);
    }

    /**
     * @param LanguageFront|null $languageFront
     * @return bool
     */
    public function isDefaultLanguageFront(?LanguageFront $languageFront): bool
    {
        if (null === $languageFront) {
            return false;
        }

        return  $this->getDefaultLanguageFront()->getId() === $languageFront->getId();
    }
}