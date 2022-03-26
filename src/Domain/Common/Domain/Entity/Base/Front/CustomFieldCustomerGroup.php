<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CustomFieldCustomerGroupRepository;

/**
 * @ORM\Table(name="`oc_custom_field_customer_group`")
 * @ORM\Entity(repositoryClass=CustomFieldCustomerGroupRepository::class)
 */
class CustomFieldCustomerGroup
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=CustomField::class)
     * @ORM\JoinColumn(name="`custom_field_id`", referencedColumnName="`custom_field_id`")
     */
    private ?CustomField $customField = null;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=CustomerGroup::class)
     * @ORM\JoinColumn(name="`customer_group_id`", referencedColumnName="`customer_group_id`")
     */
    private ?CustomerGroup $group = null;

    /**
     * @ORM\Column(type="boolean", name="`status`")
     */
    private ?bool $status = null;

    /**
     * @return CustomField|null
     */
    public function getCustomField(): ?CustomField
    {
        return $this->customField;
    }

    /**
     * @param CustomField|null $customField
     * @return CustomFieldCustomerGroup
     */
    public function setCustomField(?CustomField $customField): self
    {
        $this->customField = $customField;

        return $this;
    }

    /**
     * @return CustomerGroup|null
     */
    public function getGroup(): ?CustomerGroup
    {
        return $this->group;
    }

    /**
     * @param CustomerGroup|null $group
     * @return CustomFieldCustomerGroup
     */
    public function setGroup(?CustomerGroup $group): self
    {
        $this->group = $group;

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
     * @return CustomFieldCustomerGroup
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }
}