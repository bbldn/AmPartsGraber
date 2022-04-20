<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CustomFieldValueRepository;

#[ORM\Table(name: "`oc_custom_field_value`")]
#[ORM\Entity(repositoryClass: CustomFieldValueRepository::class)]
class CustomFieldValue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`custom_field_value_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CustomField::class)]
    #[ORM\JoinColumn(name: "`custom_field_id`", referencedColumnName: "`custom_field_id`", nullable: true)]
    private ?CustomField $customField = null;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER)]
    private ?int $sortOrder = null;

    /** @var Collection<int, CustomFieldValueDescription> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "customFieldValue",
        cascade: ["persist", "remove"],
        targetEntity: CustomFieldValueDescription::class
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
     * @return CustomFieldValue
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return CustomField|null
     */
    public function getCustomField(): ?CustomField
    {
        return $this->customField;
    }

    /**
     * @param CustomField|null $customField
     * @return CustomFieldValue
     */
    public function setCustomField(?CustomField $customField): self
    {
        $this->customField = $customField;

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
     * @return CustomFieldValue
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return Collection<int, CustomFieldValueDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}