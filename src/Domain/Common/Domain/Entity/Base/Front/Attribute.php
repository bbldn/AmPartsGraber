<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\AttributeRepository;

/**
 * @ORM\Entity(repositoryClass=AttributeRepository::class)
 * @ORM\Table(name="`oc_attribute`", indexes={@ORM\Index(name="back_id_idx", columns={"back_id"})})
 */
class Attribute
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`attribute_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity=AttributeGroup::class)
     * @ORM\JoinColumn(name="`attribute_group_id`", referencedColumnName="`attribute_group_id`")
     */
    private ?AttributeGroup $group = null;

    /**
     * @ORM\Column(type="integer", name="`sort_order`")
     */
    private ?int $sortOrder = null;

    /**
     * @var Collection|AttributeDescription[]
     * @ORM\OneToMany(
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true,
     *     mappedBy="attribute",
     *     cascade={"persist", "remove"},
     *     targetEntity=AttributeDescription::class
     * )
     *
     * @psalm-var Collection<int, AttributeDescription>
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
     * @return Attribute
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return AttributeGroup|null
     */
    public function getGroup(): ?AttributeGroup
    {
        return $this->group;
    }

    /**
     * @param AttributeGroup|null $group
     * @return Attribute
     */
    public function setGroup(?AttributeGroup $group): self
    {
        $this->group = $group;

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
     * @param int $sortOrder
     * @return Attribute
     */
    public function setSortOrder(int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return AttributeDescription[]|Collection
     *
     * @psalm-return Collection<int, AttributeDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}