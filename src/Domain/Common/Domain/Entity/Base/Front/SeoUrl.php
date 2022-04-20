<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\SeoUrlRepository;

#[ORM\Table(name: "`oc_seo_url`")]
#[ORM\Entity(repositoryClass: SeoUrlRepository::class)]
class SeoUrl
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`seo_url_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Shop::class)]
    #[ORM\JoinColumn(name: "`store_id`", referencedColumnName: "`store_id`", nullable: true)]
    private ?Shop $shop = null;

    #[ORM\ManyToOne(targetEntity: Language::class)]
    #[ORM\JoinColumn(name: "`language_id`", referencedColumnName: "`language_id`", nullable: true)]
    private ?Language $language = null;

    #[ORM\Column(name: "`query`", type: Types::STRING, length: 255)]
    private ?string $query = null;

    #[ORM\Column(name: "`keyword`", type: Types::STRING, length: 255)]
    private ?string $keyword = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return SeoUrl
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Shop|null
     */
    public function getShop(): ?Shop
    {
        return $this->shop;
    }

    /**
     * @param Shop|null $shop
     * @return SeoUrl
     */
    public function setShop(?Shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * @return Language|null
     */
    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    /**
     * @param Language|null $language
     * @return SeoUrl
     */
    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }

    /**
     * @param string|null $query
     * @return SeoUrl
     */
    public function setQuery(?string $query): self
    {
        $this->query = $query;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    /**
     * @param string|null $keyword
     * @return SeoUrl
     */
    public function setKeyword(?string $keyword): self
    {
        $this->keyword = $keyword;

        return $this;
    }
}