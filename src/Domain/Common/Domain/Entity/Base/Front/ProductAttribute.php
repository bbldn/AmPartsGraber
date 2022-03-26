<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductAttributeRepository;

/**
 * @ORM\Table(name="`oc_product_attribute`")
 * @ORM\Entity(repositoryClass=ProductAttributeRepository::class)
 */
class ProductAttribute
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="productAttributes")
     * @ORM\JoinColumn(name="`product_id`", referencedColumnName="`product_id`")
     */
    private ?Product $product = null;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Attribute::class)
     * @ORM\JoinColumn(name="`attribute_id`", referencedColumnName="`attribute_id`")
     */
    private ?Attribute $attribute = null;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Language::class)
     * @ORM\JoinColumn(name="`language_id`", referencedColumnName="`language_id`")
     */
    private ?Language $language = null;

    /**
     * @ORM\Column(type="string", name="`text`")
     */
    private ?string $text = null;

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     * @return ProductAttribute
     */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Attribute|null
     */
    public function getAttribute(): ?Attribute
    {
        return $this->attribute;
    }

    /**
     * @param Attribute|null $attribute
     * @return ProductAttribute
     */
    public function setAttribute(?Attribute $attribute): self
    {
        $this->attribute = $attribute;

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
     * @return ProductAttribute
     */
    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     * @return ProductAttribute
     */
    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }
}