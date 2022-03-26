<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\SeoProSynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\SeoUrl;
use App\Domain\Common\Domain\Entity\Base\Front\Shop as ShopFront;
use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Common\Domain\Entity\Base\Front\Language as LanguageFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Category as CategoryGraber;
use App\Domain\Common\Application\Provider\ShopProvider\Provider as ShopProvider;
use App\Domain\Common\Application\Provider\LanguageProvider\Provider as LanguageProvider;
use App\Domain\Common\Application\MultipleEntityManager\EntityManager as MultipleEntityManager;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\SeoProSynchronizer\Repository\Front\SeoUrlRepository;

/**
 * @psalm-type RowPsalm = array{query: string, shop: ShopFront, language: LanguageFront, url: string}
 */
class Synchronizer
{
    private ShopProvider $shopProvider;

    private SeoUrlRepository $seoUrlRepository;

    private LanguageProvider $languageProvider;

    private MultipleEntityManager $multipleEntityManager;

    /**
     * @param ShopProvider $shopProvider
     * @param SeoUrlRepository $seoUrlRepository
     * @param LanguageProvider $languageProvider
     * @param MultipleEntityManager $multipleEntityManager
     */
    public function __construct(
        ShopProvider $shopProvider,
        SeoUrlRepository $seoUrlRepository,
        LanguageProvider $languageProvider,
        MultipleEntityManager $multipleEntityManager
    )
    {
        $this->shopProvider = $shopProvider;
        $this->seoUrlRepository = $seoUrlRepository;
        $this->languageProvider = $languageProvider;
        $this->multipleEntityManager = $multipleEntityManager;
    }

    /**
     * @return Closure[]
     *
     * @psalm-return list<Closure>
     */
    private function getCallbackList(): array
    {
        $callbackA = static function (?ShopFront $shopFront, ?LanguageFront $languageFront): ?string {
            if (null === $shopFront || null === $languageFront) {
                return null;
            }

            $shopFrontId = $shopFront->getId();
            if (null === $shopFrontId) {
                return null;
            }

            $languageFrontId = $languageFront->getId();
            if (null === $languageFrontId) {
                return null;
            }

            return "$shopFrontId-$languageFrontId";
        };

        $callbackB = static fn(SeoUrl $seoUrl): ?string => $callbackA($seoUrl->getShop(), $seoUrl->getLanguage());

        $callbackC = static fn(CategoryFront $categoryFront): string => "category_id={$categoryFront->getId()}";

        return [$callbackA, $callbackB, $callbackC];
    }

    /**
     * @param CategoryGraber $categoryGraber
     * @param CategoryFront $categoryFront
     * @return array
     *
     * @psalm-return array<string, RowPsalm>
     */
    private function generateTable(CategoryGraber $categoryGraber, CategoryFront $categoryFront): array
    {
        [$callbackKey, , $callbackQuery] = $this->getCallbackList();

        $table = [];
        $query = $callbackQuery($categoryFront);
        $shopListFront = [$this->shopProvider->getDefaultShopFront()];
        $languageListFront = $this->languageProvider->getLanguageListFront();
        foreach ($languageListFront as $languageFront) {
            foreach ($shopListFront as $shopFront) {
                $key = $callbackKey($shopFront, $languageFront);
                if (null !== $key) {
                    $table[$key] = [
                        'query' => $query,
                        'shop' => $shopFront,
                        'language' => $languageFront,
                        'url' => $categoryGraber->getUrl(),
                    ];
                }
            }
        }

        return $table;
    }

    /**
     * @param SeoUrl $seoUrl
     * @param array $row
     * @return void
     *
     * @psalm-param RowPsalm $row
     */
    private function fillSeoUrl(SeoUrl $seoUrl, array $row): void
    {
        $seoUrl->setShop($row['shop']);
        $seoUrl->setQuery($row['query']);
        $seoUrl->setLanguage($row['language']);
        $seoUrl->setKeyword((string)$row['url']);
    }

    /**
     * @param CategoryFront $categoryFront
     * @param CategoryGraber $categoryGraber
     * @return void
     */
    public function synchronize(CategoryFront $categoryFront, CategoryGraber $categoryGraber): void
    {
        if (null === $categoryFront->getId()) {
            return;
        }

        [, $callbackSeoUrl, $callbackQuery] = $this->getCallbackList();

        $query = $callbackQuery($categoryFront);
        $seoUrlList = $this->seoUrlRepository->findByQuery($query);
        $table = $this->generateTable($categoryGraber, $categoryFront);
        foreach ($seoUrlList as $seoUrl) {
            $key = $callbackSeoUrl($seoUrl);
            if (null !== $key && false === key_exists($key, $table)) {
                $this->multipleEntityManager->removeFront($seoUrl);
                continue;
            }

            $row = $table[$key];
            unset($table[$key]);
            if (null !== $row['url']) {
                $this->fillSeoUrl($seoUrl, $row);
                $this->multipleEntityManager->persistFront($seoUrl);
            } else {
                $this->multipleEntityManager->removeFront($seoUrl);
            }
        }

        foreach ($table as $row) {
            if (null !== $row['url']) {
                $seoUrl = new SeoUrl();
                $this->fillSeoUrl($seoUrl, $row);
                $this->multipleEntityManager->persistFront($seoUrl);
            }
        }
    }
}