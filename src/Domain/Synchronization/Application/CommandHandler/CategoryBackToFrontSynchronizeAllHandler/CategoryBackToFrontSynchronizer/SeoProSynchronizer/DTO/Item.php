<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\SeoProSynchronizer\DTO;

use App\Domain\Common\Domain\Entity\Base\Front\Shop;
use App\Domain\Common\Domain\Entity\Base\Front\Language;

class Item
{
    private Shop $shop;

    private ?string $url;

    private string $query;

    private Language $language;

    /**
     * @param Shop $shop
     * @param string|null $url
     * @param string $query
     * @param Language $language
     */
    public function __construct(
        Shop $shop,
        ?string $url,
        string $query,
        Language $language
    )
    {
        $this->shop = $shop;
        $this->url = $url;
        $this->query = $query;
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return Item
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     * @return Item
     */
    public function setQuery(string $query): self
    {
        $this->query = $query;

        return $this;
    }

    /**
     * @return Shop
     */
    public function getShop(): Shop
    {
        return $this->shop;
    }

    /**
     * @param Shop $shop
     * @return Item
     */
    public function setShop(Shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * @return Language
     */
    public function getLanguage(): Language
    {
        return $this->language;
    }

    /**
     * @param Language $language
     * @return Item
     */
    public function setLanguage(Language $language): self
    {
        $this->language = $language;

        return $this;
    }
}