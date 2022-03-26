<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\FilterRepository;

/**
 * @ORM\Table(name="`oc_filter`")
 * @ORM\Entity(repositoryClass=FilterRepository::class)
 */
class Filter
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`filter_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity=FilterGroup::class)
     * @ORM\JoinColumn(name="`filter_group_id`", referencedColumnName="`filter_group_id`")
     */
    private ?FilterGroup $filterGroup = null;

    /**
     * @ORM\Column(type="integer", name="`sort_order`")
     */
    private ?int $sortOrder = 0;

    /**
     * @var Collection|FilterDescription[]
     * @ORM\OneToMany(
     *     mappedBy="filter",
     *     orphanRemoval=true,
     *     fetch="EXTRA_LAZY",
     *     cascade={"persist", "remove"},
     *     targetEntity=FilterDescription::class
     * )
     *
     * @psalm-var Collection<int, FilterDescription>
     */
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
     * @return FilterDescription[]|Collection
     *
     * @psalm-return Collection<int, FilterDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}