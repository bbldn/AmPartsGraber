<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\FilterGroupRepository;

/**
 * @ORM\Table(name="`oc_filter_group`")
 * @ORM\Entity(repositoryClass=FilterGroupRepository::class)
 */
class FilterGroup
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`filter_group_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="integer", name="`sort_order`")
     */
    private ?int $sortOrder = 0;

    /**
     * @var Collection|FilterGroupDescription[]
     * @ORM\OneToMany(
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true,
     *     mappedBy="filterGroup",
     *     cascade={"persist", "remove"},
     *     targetEntity=FilterGroupDescription::class
     * )
     *
     * @psalm-var Collection<int, FilterGroupDescription>
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
     * @return FilterGroup
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

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
     * @return FilterGroup
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return FilterGroupDescription[]|Collection
     *
     * @psalm-return Collection<int, FilterGroupDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}