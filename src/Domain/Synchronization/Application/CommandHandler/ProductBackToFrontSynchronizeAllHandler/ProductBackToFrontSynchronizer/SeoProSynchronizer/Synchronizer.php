<?php

namespace App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\SeoProSynchronizer;

use Closure;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Domain\Common\Domain\Entity\Base\Front\Shop as ShopFront;
use App\Domain\Common\Domain\Entity\Base\Front\SeoUrl as SeoUrlFront;
use App\Domain\Common\Domain\Entity\Base\Front\Product as ProductFront;
use App\Domain\Common\Domain\Entity\Base\Front\Language as LanguageFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Product as ProductGraber;
use App\Domain\Common\Application\Provider\ShopProvider\Provider as ShopProvider;
use App\Domain\Common\Application\Provider\LanguageProvider\Provider as LanguageProvider;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\SeoProSynchronizer\DTO\Item;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\SeoProSynchronizer\Repository\Front\SeoUrlRepository as SeoUrlFrontRepository;

class Synchronizer
{
    private ShopProvider $shopProvider;

    private EntityManager $entityManagerFront;

    private LanguageProvider $languageProvider;

    private SeoUrlFrontRepository $seoUrlFrontRepository;

    /**
     * @param ShopProvider $shopProvider
     * @param EntityManager $entityManagerFront
     * @param LanguageProvider $languageProvider
     * @param SeoUrlFrontRepository $seoUrlFrontRepository
     */
    public function __construct(
        ShopProvider $shopProvider,
        EntityManager $entityManagerFront,
        LanguageProvider $languageProvider,
        SeoUrlFrontRepository $seoUrlFrontRepository
    )
    {
        $this->shopProvider = $shopProvider;
        $this->entityManagerFront = $entityManagerFront;
        $this->languageProvider = $languageProvider;
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
     * @return Item[]
     *
     * @psalm-return list<Item>
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
                    $url = basename((string)$productGraber->getUrl());
                    $table[$key] = new Item($shopFront, $url, $query, $languageFront);
                }
            }
        }

        return $table;
    }

    /**
     * @param SeoUrlFront $seoUrlFront
     * @param Item $item
     * @return void
     */
    private function fillSeoUrl(SeoUrlFront $seoUrlFront, Item $item): void
    {
        $seoUrlFront->setShop($item->getShop());
        $seoUrlFront->setQuery($item->getQuery());
        $seoUrlFront->setKeyword($item->getUrl());
        $seoUrlFront->setLanguage($item->getLanguage());
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
                $this->entityManagerFront->remove($seoUrlFront);
                continue;
            }

            $item = $table[$key];
            unset($table[$key]);
            if (null !== $item->getUrl()) {
                $this->fillSeoUrl($seoUrlFront, $item);
                $this->entityManagerFront->persist($seoUrlFront);
            } else {
                $this->entityManagerFront->remove($seoUrlFront);
            }
        }

        foreach ($table as $item) {
            if (null !== $item->getUrl()) {
                $seoUrlFront = new SeoUrlFront();
                $this->fillSeoUrl($seoUrlFront, $item);
                $this->entityManagerFront->persist($seoUrlFront);
            }
        }
    }
}