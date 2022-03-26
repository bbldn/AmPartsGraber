<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductFaqRepository;

/**
 * @ORM\Entity(repositoryClass=ProductFaqRepository::class)
 * @ORM\Table(name="`oc_product_faq`", indexes={@ORM\Index(name="back_id_idx", columns={"back_id"})})
 */
class ProductFaq
{
    /**
     * Идентификатор
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`product_faq_id`", options={"unsigned":true})
     */
    private ?int $id = null;

    /**
     * Товар
     * @ORM\ManyToOne(targetEntity=Product::class, cascade={"persist"})
     * @ORM\JoinColumn(name="`product_id`", referencedColumnName="`product_id`")
     */
    private ?Product $product = null;

    /**
     * Порядок сортировки
     * @ORM\Column(type="integer", name="`sort_order`", options={"default":0})
     */
    private ?int $sortOrder = 0;

    /**
     * Вопрос
     * @ORM\Column(type="text", name="`question`", nullable=true)
     */
    private ?string $question = null;

    /**
     * Вопрос
     * @ORM\Column(type="text", name="`faq`", nullable=true)
     */
    private ?string $faq = null;

    /**
     * Название
     * @ORM\Column(type="string", name="`icon`", length=32, nullable=true)
     */
    private ?string $icon = null;

    /**
     * @ORM\Column(type="integer", name="`back_id`", nullable=true)
     */
    private ?int $backId = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return ProductFaq
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     * @return ProductFaq
     */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    /**
     * @param int|null $sortOrder
     * @return ProductFaq
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuestion(): ?string
    {
        return $this->question;
    }

    /**
     * @param string|null $question
     * @return ProductFaq
     */
    public function setQuestion(?string $question): self
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFaq(): ?string
    {
        return $this->faq;
    }

    /**
     * @param string|null $faq
     * @return ProductFaq
     */
    public function setFaq(?string $faq): self
    {
        $this->faq = $faq;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param string|null $icon
     * @return ProductFaq
     */
    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBackId(): ?int
    {
        return $this->backId;
    }

    /**
     * @param int|null $backId
     * @return ProductFaq
     */
    public function setBackId(?int $backId): self
    {
        $this->backId = $backId;

        return $this;
    }
}