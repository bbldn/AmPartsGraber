<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductDescriptionRepository;

/**
 * @ORM\Table(name="`oc_product_description`")
 * @ORM\Entity(repositoryClass=ProductDescriptionRepository::class)
 */
class ProductDescription
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="productDescriptions")
     * @ORM\JoinColumn(name="`product_id`", referencedColumnName="`product_id`")
     */
    private ?Product $product = null;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Language::class)
     * @ORM\JoinColumn(name="`language_id`", referencedColumnName="`language_id`")
     */
    private ?Language $language = null;

    /**
     * @ORM\Column(type="string", name="`name`", length=255)
     */
    private ?string $name = null;

    /**
     * @ORM\Column(type="string", name="`description`")
     */
    private ?string $description = null;

    /**
     * @ORM\Column(type="string", name="`meta_h1`", nullable=true, length=100)
     */
    private ?string $metaH1 = null;

    /**
     * @ORM\Column(type="string", name="`tag`")
     */
    private ?string $tag = null;

    /**
     * @ORM\Column(type="string", name="`meta_title`", length=255)
     */
    private ?string $metaTitle = null;

    /**
     * @ORM\Column(type="string", name="`meta_description`", length=255)
     */
    private ?string $metaDescription = null;

    /**
     * @ORM\Column(type="string", name="`meta_keyword`", length=255)
     */
    private ?string $metaKeyword = null;

    /**
     * Faq Name
     * @ORM\Column(type="string", name="`faq_name`", length=255, nullable=true)
     */
    private ?string $faqName = null;

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     * @return ProductDescription
     */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;

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
     * @return ProductDescription
     */
    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

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
     * @return ProductDescription
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

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
     * @return ProductDescription
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetaH1(): ?string
    {
        return $this->metaH1;
    }

    /**
     * @param string|null $metaH1
     * @return ProductDescription
     */
    public function setMetaH1(?string $metaH1): self
    {
        $this->metaH1 = $metaH1;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }

    /**
     * @param string|null $tag
     * @return ProductDescription
     */
    public function setTag(?string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetaTitle(): ?string
    {
        return $this->metaTitle;
    }

    /**
     * @param string|null $metaTitle
     * @return ProductDescription
     */
    public function setMetaTitle(?string $metaTitle): self
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    /**
     * @param string|null $metaDescription
     * @return ProductDescription
     */
    public function setMetaDescription(?string $metaDescription): self
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetaKeyword(): ?string
    {
        return $this->metaKeyword;
    }

    /**
     * @param string|null $metaKeyword
     * @return ProductDescription
     */
    public function setMetaKeyword(?string $metaKeyword): self
    {
        $this->metaKeyword = $metaKeyword;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFaqName(): ?string
    {
        return $this->faqName;
    }

    /**
     * @param string|null $faqName
     * @return ProductDescription
     */
    public function setFaqName(?string $faqName): self
    {
        $this->faqName = $faqName;

        return $this;
    }
}