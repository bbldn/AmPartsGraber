<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\AttributeRepository;

#[ORM\Table(name: "`oc_attribute`")]
#[ORM\Index(name: "back_id_idx", columns: ["back_id"])]
#[ORM\Entity(repositoryClass: AttributeRepository::class)]
class Attribute
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`attribute_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: AttributeGroup::class)]
    #[ORM\JoinColumn(name: "`attribute_group_id`", referencedColumnName: "`attribute_group_id`", nullable: true)]
    private ?AttributeGroup $group = null;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER)]
    private ?int $sortOrder = null;

    #[ORM\Column(name: "`back_id`", type: Types::INTEGER, nullable: true)]
    private ?int $backId = null;

    /** @var Collection<int, AttributeDescription> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "attribute",
        cascade: ["persist", "remove"],
        targetEntity: AttributeDescription::class
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
     * @param int|null $sortOrder
     * @return Attribute
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

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
     * @return Attribute
     */
    public function setBackId(?int $backId): self
    {
        $this->backId = $backId;

        return $this;
    }

    /**
     * @return Collection<int, AttributeDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}