<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\SeoProSynchronizer;

use App\Domain\Common\Domain\Entity\Base\Front\Shop as ShopFront;
use App\Domain\Common\Domain\Entity\Base\Front\SeoUrl as SeoUrlFront;
use App\Domain\Common\Domain\Entity\Base\Front\Product as ProductFront;
use App\Domain\Common\Domain\Entity\Base\Front\Language as LanguageFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Product as ProductGraber;
use App\Domain\Common\Application\Provider\ShopProvider\Provider as ShopProvider;
use App\Domain\Common\Application\Provider\LanguageProvider\Provider as LanguageProvider;
use App\Domain\Common\Application\MultipleEntityManager\EntityManager as MultipleEntityManager;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\SeoProSynchronizer\Repository\Front\SeoUrlRepository as SeoUrlFrontRepository;

/**
 * @psalm-type RowPsalm = array{query: string, shop: ShopFront, language: LanguageFront, url: string}
 */
class Synchronizer
{
    private ShopProvider $shopProvider;

    private LanguageProvider $languageProvider;

    private MultipleEntityManager $multipleEntityManager;

    private SeoUrlFrontRepository $seoUrlFrontRepository;

    /**
     * @param ShopProvider $shopProvider
     * @param LanguageProvider $languageProvider
     * @param MultipleEntityManager $multipleEntityManager
     * @param SeoUrlFrontRepository $seoUrlFrontRepository
     */
    public function __construct(
        ShopProvider $shopProvider,
        LanguageProvider $languageProvider,
        MultipleEntityManager $multipleEntityManager,
        SeoUrlFrontRepository $seoUrlFrontRepository
    )
    {
        $this->shopProvider = $shopProvider;
        $this->languageProvider = $languageProvider;
        $this->multipleEntityManager = $multipleEntityManager;
        $this->seoUrlFrontRepository = $seoUrlFrontRepository;
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

        $callbackB = static fn(SeoUrlFront $seoUrl): ?string => $callbackA($seoUrl->getShop(), $seoUrl->getLanguage());

        $callbackC = static fn(ProductFront $productFront): string => "product_id={$productFront->getId()}";

        return [$callbackA, $callbackB, $callbackC];
    }

    /**
     * @param ProductGraber $productGraber
     * @param ProductFront $productFront
     * @return array
     *
     * @psalm-return array<string, RowPsalm>
     */
    private function generateTable(ProductGraber $productGraber, ProductFront $productFront): array
    {
        [$callbackKey, , $callbackQuery] = $this->getCallbackList();

        $table = [];
        $query = $callbackQuery($productFront);
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
                        'url' => basename($productGraber->getUrl()),
                    ];
                }
            }
        }

        return $table;
    }

    /**
     * @param SeoUrlFront $seoUrlFront
     * @param array $row
     * @return void
     *
     * @psalm-param RowPsalm $row
     */
    private function fillSeoUrl(SeoUrlFront $seoUrlFront, array $row): void
    {
        $seoUrlFront->setShop($row['shop']);
        $seoUrlFront->setQuery($row['query']);
        $seoUrlFront->setLanguage($row['language']);
        $seoUrlFront->setKeyword((string)$row['url']);
    }

    /**
     * @param ProductFront $productFront
     * @param ProductGraber $productGraber
     * @return void
     */
    public function synchronize(ProductFront $productFront, ProductGraber $productGraber): void
    {
        if (null === $productFront->getId()) {
            return;
        }

        [, $callbackSeoUrl, $callbackQuery] = $this->getCallbackList();

        $query = $callbackQuery($productFront);
        $seoUrlList = $this->seoUrlFrontRepository->findByQuery($query);
        $table = $this->generateTable($productGraber, $productFront);
        foreach ($seoUrlList as $seoUrlFront) {
            $key = $callbackSeoUrl($seoUrlFront);
            if (null !== $key && false === key_exists($key, $table)) {
                $this->multipleEntityManager->removeFront($seoUrlFront);
                continue;
            }

            $row = $table[$key];
            unset($table[$key]);
            if (null !== $row['url']) {
                $this->fillSeoUrl($seoUrlFront, $row);
                $this->multipleEntityManager->persistFront($seoUrlFront);
            } else {
                $this->multipleEntityManager->removeFront($seoUrlFront);
            }
        }

        foreach ($table as $row) {
            if (null !== $row['url']) {
                $seoUrlFront = new SeoUrlFront();
                $this->fillSeoUrl($seoUrlFront, $row);
                $this->multipleEntityManager->persistFront($seoUrlFront);
            }
        }
    }
}