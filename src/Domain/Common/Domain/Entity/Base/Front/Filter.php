<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\FilterRepository;

#[ORM\Table(name: "`oc_filter`")]
#[ORM\Entity(repositoryClass: FilterRepository::class)]
class Filter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`filter_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: FilterGroup::class)]
    #[ORM\JoinColumn(name: "`filter_group_id`", referencedColumnName: "`filter_group_id`", nullable: true)]
    private ?FilterGroup $filterGroup = null;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER)]
    private ?int $sortOrder = null;

    /** @var Collection<int, FilterDescription> */
    #[ORM\OneToMany(
        mappedBy: "filter",
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        cascade: ["persist", "remove"],
        targetEntity: FilterDescription::class
    )]
    private Collection $descriptions;

    public function __construct()
    {
        $this->descriptions = new ArrayCollection();
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
     * @return Filter
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return FilterGroup|null
     */
    public function getFilterGroup(): ?FilterGroup
    {
        return $this->filterGroup;
    }

    /**
     * @param FilterGroup|null $filterGroup
     * @return Filter
     */
    public function setFilterGroup(?FilterGroup $filterGroup): self
    {
        $this->filterGroup = $filterGroup;

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
     * @return Filter
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return Collection<int, FilterDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}