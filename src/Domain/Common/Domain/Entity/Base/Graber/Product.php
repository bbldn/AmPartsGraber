<?php

namespace App\Domain\Common\Domain\Entity\Base\Graber;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Graber\ProductRepository;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ORM\Table(
 *     name="`products`",
 *     indexes={
 *         @ORM\Index(name="url_idx", columns={"url"}),
 *         @ORM\Index(name="code_idx", columns={"code"})
 *     }
 * )
 */
class Product
{
    /**
     * Идентификатор
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`id`", options={"unsigned":true})
     */
    private ?int $id = null;

    /**
     * Ссылка
     * @ORM\Column(type="string", name="`url`", length=512, nullable=true)
     */
    private ?string $url = null;

    /**
     * Артикул
     * @ORM\Column(type="string", name="`code`", length=512)
     */
    private ?string $code = null;

    /**
     * Цена
     * @ORM\Column(type="float", name="`price`", options={"default":0})
     */
    private ?float $price = 0.0;

    /**
     * Название
     * @ORM\Column(type="string", name="`name`", length=512, nullable=true)
     */
    private ?string $name = null;

    /**
     * Ссылка на картинку
     * @ORM\Column(type="string", name="`image_url`", length=512, nullable=true)
     */
    private ?string $imageUrl = null;

    /**
     * Описание
     * @ORM\Column(type="text", name="`description`", nullable=true)
     */
    private ?string $description = null;

    /**
     * Ссылка на категорию
     * @ORM\Column(type="string", name="`category_url`", length=512, nullable=true)
     */
    private ?string $categoryUrl = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Product
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return Product
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     * @return Product
     */
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return Product
     */
    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Product
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    /**
     * @param string|null $imageUrl
     * @return Product
     */
    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Product
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCategoryUrl(): ?string
    {
        return $this->categoryUrl;
    }

    /**
     * @param string|null $categoryUrl
     * @return Product
     */
    public function setCategoryUrl(?string $categoryUrl): self
    {
        $this->categoryUrl = $categoryUrl;

        return $this;
    }
}