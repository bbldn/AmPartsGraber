<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CustomFieldDescriptionRepository;

#[ORM\Table(name: "`oc_custom_field_description`")]
#[ORM\Entity(repositoryClass: CustomFieldDescriptionRepository::class)]
class CustomFieldDescription
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CustomField::class)]
    #[ORM\JoinColumn(name: "`custom_field_id`", referencedColumnName: "`custom_field_id`")]
    private ?CustomField $customField = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Language::class)]
    #[ORM\JoinColumn(name: "`language_id`", referencedColumnName: "`language_id`")]
    private ?Language $language = null;

    #[ORM\Column(name: "`name`", type: Types::STRING, length: 128)]
    private ?string $name = null;

    /**
     * @return CustomField|null
     */
    public function getCustomField(): ?CustomField
    {
        return $this->customField;
    }

    /**
     * @param CustomField|null $customField
     * @return CustomFieldDescription
     */
    public function setCustomField(?CustomField $customField): self
    {
        $this->customField = $customField;

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
     * @return CustomFieldDescription
     */
    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

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
     * @return CustomFieldDescription
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}