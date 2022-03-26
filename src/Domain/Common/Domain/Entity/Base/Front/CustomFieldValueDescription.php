<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CustomFieldValueDescriptionRepository;

/**
 * @ORM\Table(name="`oc_custom_field_value_description`")
 * @ORM\Entity(repositoryClass=CustomFieldValueDescriptionRepository::class)
 */
class CustomFieldValueDescription
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=CustomFieldValue::class)
     * @ORM\JoinColumn(name="`custom_field_value_id`", referencedColumnName="`custom_field_value_id`")
     */
    private ?CustomFieldValue $customFieldValue = null;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Language::class)
     * @ORM\JoinColumn(name="`language_id`", referencedColumnName="`language_id`")
     */
    private ?Language $language = null;

    /**
     * @ORM\ManyToOne(targetEntity=CustomField::class)
     * @ORM\JoinColumn(name="`custom_field_id`", referencedColumnName="`custom_field_id`")
     */
    private ?CustomField $customField = null;

    /**
     * @ORM\Column(type="string", name="`name`", length=128)
     */
    private ?string $name = null;

    /**
     * @return CustomFieldValue|null
     */
    public function getCustomFieldValue(): ?CustomFieldValue
    {
        return $this->customFieldValue;
    }

    /**
     * @param CustomFieldValue|null $customFieldValue
     * @return CustomFieldValueDescription
     */
    public function setCustomFieldValue(?CustomFieldValue $customFieldValue): self
    {
        $this->customFieldValue = $customFieldValue;

        return $this;
    }

    /**
     * @return Language|null
     */
    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    /**
     * @param Language|null $language
     * @return CustomFieldValueDescription
     */
    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

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
     * @return CustomFieldValueDescription
     */
    public function setCustomField(?CustomField $customField): self
    {
        $this->customField = $customField;

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
     * @return CustomFieldValueDescription
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}