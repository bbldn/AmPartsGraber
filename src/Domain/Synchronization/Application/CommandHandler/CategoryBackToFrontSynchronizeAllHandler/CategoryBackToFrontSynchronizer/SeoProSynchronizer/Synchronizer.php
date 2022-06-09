<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\SeoProSynchronizer;

use Closure;
use App\Domain\Common\Domain\Entity\Base\Front\SeoUrl;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Domain\Common\Domain\Entity\Base\Front\Shop as ShopFront;
use App\Domain\Common\Domain\Entity\Base\Front\SeoUrl as SeoUrlFront;
use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Common\Domain\Entity\Base\Front\Language as LanguageFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Category as CategoryGraber;
use App\Domain\Common\Application\Provider\ShopProvider\Provider as ShopProvider;
use App\Domain\Common\Application\Provider\LanguageProvider\Provider as LanguageProvider;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\ProductBackToFrontSynchronizer\SeoProSynchronizer\DTO\Item;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\SeoProSynchronizer\Repository\Front\SeoUrlRepository;

class Synchronizer
{
    private ShopProvider $shopProvider;

    private EntityManager $entityManagerFront;

    private SeoUrlRepository $seoUrlRepository;

    private LanguageProvider $languageProvider;

    /**
     * @param ShopProvider $shopProvider
     * @param EntityManager $entityManagerFront
     * @param SeoUrlRepository $seoUrlRepository
     * @param LanguageProvider $languageProvider
     */
    public function __construct(
        ShopProvider $shopProvider,
        EntityManager $entityManagerFront,
        SeoUrlRepository $seoUrlRepository,
        LanguageProvider $languageProvider
    )
    {
        $this->shopProvider = $shopProvider;
        $this->entityManagerFront = $entityManagerFront;
        $this->seoUrlRepository = $seoUrlRepository;
        $this->languageProvider = $languageProvider;
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
     * @return Item[]
     *
     * @psalm-return list<Item>
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
                    $url = basename((string)$categoryGraber->getUrl());
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
                $this->entityManagerFront->remove($seoUrl);
                continue;
            }

            $item = $table[$key];
            unset($table[$key]);
            if (null !== $item->getUrl()) {
                $this->fillSeoUrl($seoUrl, $item);
                $this->entityManagerFront->persist($seoUrl);
            } else {
                $this->entityManagerFront->remove($seoUrl);
            }
        }

        foreach ($table as $item) {
            if (null !== $item->getUrl()) {
                $seoUrl = new SeoUrl();
                $this->fillSeoUrl($seoUrl, $item);
                $this->entityManagerFront->persist($seoUrl);
            }
        }
    }
}