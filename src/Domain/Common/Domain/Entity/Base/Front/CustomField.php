<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CustomFieldRepository;

#[ORM\Table(name: "`oc_custom_field`")]
#[ORM\Entity(repositoryClass: CustomFieldRepository::class)]
class CustomField
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`custom_field_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: "`type`", type: Types::STRING, length: 32)]
    private ?string $type = null;

    #[ORM\Column(name: "`value`", type: Types::TEXT)]
    private ?string $value = null;

    #[ORM\Column(name: "`validation`", type: Types::STRING, length: 255)]
    private ?string $validation = null;

    #[ORM\Column(name: "`location`", type: Types::STRING, length: 10)]
    private ?string $location = null;

    #[ORM\Column(name: "`status`", type: Types::BOOLEAN)]
    private ?bool $status = null;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER)]
    private ?int $sortOrder = null;

    /** @var Collection<int, CustomFieldValue> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "customField",
        cascade: ["persist", "remove"],
        targetEntity: CustomFieldValue::class
    )]
    private Collection $values;

    /** @var Collection<int, CustomFieldDescription> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "customField",
        cascade: ["persist", "remove"],
        targetEntity: CustomFieldDescription::class
    )]
    private Collection $descriptions;

    /**  @var Collection<int, CustomFieldCustomerGroup> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "customField",
        cascade: ["persist", "remove"],
        targetEntity: CustomFieldCustomerGroup::class
    )]
    private Collection $customerGroups;

    public function __construct()
    {
        $this->values = new ArrayCollection();
        $this->descriptions = new ArrayCollection();
        $this->customerGroups = new ArrayCollection();
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
     * @return CustomField
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return CustomField
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     * @return CustomField
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getValidation(): ?string
    {
        return $this->validation;
    }

    /**
     * @param string|null $validation
     * @return CustomField
     */
    public function setValidation(?string $validation): self
    {
        $this->validation = $validation;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param string|null $location
     * @return CustomField
     */
    public function setLocation(?string $location): self
    {
        $this->location = $location;

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
     * @return CustomField
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;

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
     * @return CustomField
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return Collection<int, CustomFieldValue>
     */
    public function getValues(): Collection
    {
        return $this->values;
    }

    /**
     * @return Collection<int, CustomFieldDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }

    /**
     * @return Collection<int, CustomFieldCustomerGroup>
     */
    public function getCustomerGroups(): Collection
    {
        return $this->customerGroups;
    }
}