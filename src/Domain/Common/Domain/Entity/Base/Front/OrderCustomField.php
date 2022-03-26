<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OrderCustomFieldRepository;

/**
 * @ORM\Table(name="`oc_order_custom_field`")
 * @ORM\Entity(repositoryClass=OrderCustomFieldRepository::class)
 */
class OrderCustomField
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`order_custom_field_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class)
     * @ORM\JoinColumn(name="`order_id`", referencedColumnName="`order_id`")
     */
    private ?Order $order = null;

    /**
     * @ORM\ManyToOne(targetEntity=CustomField::class)
     * @ORM\JoinColumn(name="`custom_field_id`", referencedColumnName="`custom_field_id`")
     */
    private ?CustomField $customField = null;

    /**
     * @ORM\ManyToOne(targetEntity=CustomFieldValue::class)
     * @ORM\JoinColumn(name="`custom_field_value_id`", referencedColumnName="`custom_field_value_id`")
     */
    private ?CustomFieldValue $customFieldValue = null;

    /**
     * @ORM\Column(type="string", name="`name`", length=255)
     */
    private ?string $name = null;

    /**
     * @ORM\Column(type="string", name="`value`")
     */
    private ?string $value = null;

    /**
     * @ORM\Column(type="string", name="`type`", length=32)
     */
    private ?string $type = null;

    /**
     * @ORM\Column(type="string", name="`location`", length=16)
     */
    private ?string $location = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return OrderCustomField
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Order|null
     */
    public function getOrder(): ?Order
    {
        return $this->order;
    }

    /**
     * @param Order|null $order
     * @return OrderCustomField
     */
    public function setOrder(?Order $order): self
    {
        $this->order = $order;

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
     * @return OrderCustomField
     */
    public function setCustomField(?CustomField $customField): self
    {
        $this->customField = $customField;

        return $this;
    }

    /**
     * @return CustomFieldValue|null
     */
    public function getCustomFieldValue(): ?CustomFieldValue
    {
        return $this->customFieldValue;
    }

    /**
     * @param CustomFieldValue|null $customFieldValue
     * @return OrderCustomField
     */
    public function setCustomFieldValue(?CustomFieldValue $customFieldValue): self
    {
        $this->customFieldValue = $customFieldValue;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return OrderCustomField
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

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
     * @return OrderCustomField
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;

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
     * @return OrderCustomField
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

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
     * @return OrderCustomField
     */
    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }
}