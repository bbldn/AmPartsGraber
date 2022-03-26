<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CustomFieldRepository;

/**
 * @ORM\Table(name="`oc_custom_field`")
 * @ORM\Entity(repositoryClass=CustomFieldRepository::class)
 */
class CustomField
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`custom_field_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", name="`type`", length=32)
     */
    private ?string $type = null;

    /**
     * @ORM\Column(type="text", name="`value`")
     */
    private ?string $value = null;

    /**
     * @ORM\Column(type="string", name="`validation`", length=255)
     */
    private ?string $validation = null;

    /**
     * @ORM\Column(type="string", name="`location`", length=10)
     */
    private ?string $location = null;

    /**
     * @ORM\Column(type="boolean", name="`status`")
     */
    private ?bool $status = null;

    /**
     * @ORM\Column(type="integer", name="`sort_order`")
     */
    private ?int $sortOrder = null;

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
}