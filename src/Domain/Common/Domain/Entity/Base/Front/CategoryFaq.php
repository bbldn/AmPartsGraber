<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CategoryFaqRepository;

#[ORM\Table(name: "`oc_category_faq`")]
#[ORM\Index(name: "back_id_idx", columns: ["back_id"])]
#[ORM\Entity(repositoryClass: CategoryFaqRepository::class)]
class CategoryFaq
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`category_faq_id`", type: Types::INTEGER, options: ["unsigned" => true])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Category::class, cascade: ["persist"])]
    #[ORM\JoinColumn(name: "`category_id`", referencedColumnName: "`category_id`", nullable: true)]
    private ?Category $category = null;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER, nullable: true)]
    private ?int $sortOrder = null;

    #[ORM\Column(name: "`question`", type: Types::TEXT)]
    private ?string $question = null;

    #[ORM\Column(name: "`faq`", type: Types::TEXT, nullable: true, columnDefinition: 'LONGTEXT')]
    private ?string $faq = null;

    #[ORM\Column(name: "`icon`", type: Types::STRING, length: 32, nullable: true)]
    private ?string $icon = null;

    #[ORM\Column(name: "`back_id`", type: Types::INTEGER, nullable: true)]
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
     * @return CategoryFaq
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category|null $category
     * @return CategoryFaq
     */
    public function setCategory(?Category $category): self
    {
        $this->category = $category;

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
     * @return CategoryFaq
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
     * @return CategoryFaq
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
     * @return CategoryFaq
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
     * @return CategoryFaq
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
     * @return CategoryFaq
     */
    public function setBackId(?int $backId): self
    {
        $this->backId = $backId;

        return $this;
    }
}