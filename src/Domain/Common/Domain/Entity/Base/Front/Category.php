<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CategoryRepository;

#[ORM\HasLifecycleCallbacks]
#[ORM\Table(name: "`oc_category`")]
#[ORM\Index(name: "back_id_idx", columns: ["back_id"])]
#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`category_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: "`image`", type: Types::STRING, nullable: true)]
    private ?string $image = null;

    #[ORM\ManyToOne(targetEntity: Category::class)]
    #[ORM\JoinColumn(name: "`parent_id`", referencedColumnName: "`category_id`", nullable: true)]
    private ?Category $parent = null;

    #[ORM\Column(name: "`top`", type: Types::BOOLEAN)]
    private ?bool $top = null;

    #[ORM\Column(name: "`column`", type: Types::INTEGER)]
    private ?int $column = null;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER, options: ["default" => 0])]
    private ?int $sortOrder = 0;

    #[ORM\Column(name: "`status`", type: Types::BOOLEAN)]
    private ?bool $status = null;

    #[ORM\Column(name: "`date_added`", type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $dateAdded = null;

    #[ORM\Column(name: "`date_modified`", type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $dateModified = null;

    #[ORM\Column(name: "`back_id`", type: Types::INTEGER, nullable: true)]
    private ?int $backId = null;

    /** @var Collection<int, CategoryPath> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "categoryA",
        cascade: ["persist", "remove"],
        targetEntity: CategoryPath::class
    )]
    private Collection $paths;

    /** @var Collection<int, CategoryDescription> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "category",
        cascade: ["persist", "remove"],
        targetEntity: CategoryDescription::class
    )]
    private Collection $descriptions;

    /** @var Collection<int, Shop> */
    #[ORM\ManyToMany(targetEntity: Shop::class, fetch: "EXTRA_LAZY")]
    #[ORM\JoinTable(name: "oc_category_to_store")]
    #[ORM\JoinColumn(name: "category_id", referencedColumnName: "`category_id`")]
    #[ORM\InverseJoinColumn(name: "store_id", referencedColumnName: "`store_id`")]
    private Collection $shops;

    /** @var Collection<int, Filter> */
    #[ORM\ManyToMany(targetEntity: Filter::class, fetch: "EXTRA_LAZY")]
    #[ORM\JoinTable(name: "oc_category_filter")]
    #[ORM\JoinColumn(name: "category_id", referencedColumnName: "`category_id`")]
    #[ORM\InverseJoinColumn(name: "filter_id", referencedColumnName: "`filter_id`")]
    private Collection $filters;

    /** @var Collection<int, CategoryFaq> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "category",
        cascade: ["persist", "remove"],
        targetEntity: CategoryFaq::class
    )]
    private Collection $categoryFaqs;

    /** @var Collection<int, CategoryToLayout> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "category",
        cascade: ["persist", "remove"],
        targetEntity: CategoryToLayout::class
    )]
    private Collection $categoryToLayouts;

    public function __construct()
    {
        $this->paths = new ArrayCollection();
        $this->shops = new ArrayCollection();
        $this->filters = new ArrayCollection();
        $this->categoryFaqs = new ArrayCollection();
        $this->descriptions = new ArrayCollection();
        $this->categoryToLayouts = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Category
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     * @return Category
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Category|null
     */
    public function getParent(): ?Category
    {
        return $this->parent;
    }

    /**
     * @param Category|null $parent
     * @return Category
     */
    public function setParent(?Category $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getTop(): ?bool
    {
        return $this->top;
    }

    /**
     * @param bool|null $top
     * @return Category
     */
    public function setTop(?bool $top): self
    {
        $this->top = $top;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getColumn(): ?int
    {
        return $this->column;
    }

    /**
     * @param int|null $column
     * @return Category
     */
    public function setColumn(?int $column): self
    {
        $this->column = $column;

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
     * @return Category
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * @param bool|null $status
     * @return Category
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDateAdded(): ?DateTimeImmutable
    {
        return $this->dateAdded;
    }

    /**
     * @param DateTimeImmutable|null $dateAdded
     * @return Category
     */
    public function setDateAdded(?DateTimeImmutable $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDateModified(): ?DateTimeImmutable
    {
        return $this->dateModified;
    }

    /**
     * @param DateTimeImmutable|null $dateModified
     * @return Category
     */
    public function setDateModified(?DateTimeImmutable $dateModified): self
    {
        $this->dateModified = $dateModified;

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
     * @return Category
     */
    public function setBackId(?int $backId): self
    {
        $this->backId = $backId;

        return $this;
    }

    /**
     * @return Collection<int, CategoryPath>
     */
    public function getPaths(): Collection
    {
        return $this->paths;
    }

    /**
     * @return Collection<int, CategoryDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }

    /**
     * @return Collection<int, Shop>
     */
    public function getShops(): Collection
    {
        return $this->shops;
    }

    /**
     * @return Collection<int, Filter>
     */
    public function getFilters(): Collection
    {
        return $this->filters;
    }

    /**
     * @return Collection<int, CategoryFaq>
     */
    public function getCategoryFaqs(): Collection
    {
        return $this->categoryFaqs;
    }

    /**
     * @return Collection<int, CategoryToLayout>
     */
    public function getCategoryToLayouts(): Collection
    {
        return $this->categoryToLayouts;
    }

    #[ORM\PreUpdate, ORM\PrePersist]
    public function updatedTimestamps(): void
    {
        $this->setDateModified(new DateTimeImmutable());

        if (null === $this->getDateAdded()) {
            $this->setDateAdded(new DateTimeImmutable());
        }
    }
}