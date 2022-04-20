<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\AttributeDescriptionRepository;

#[ORM\Table(name: "`oc_attribute_description`")]
#[ORM\Entity(repositoryClass: AttributeDescriptionRepository::class)]
class AttributeDescription
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Attribute::class, inversedBy: "descriptions")]
    #[ORM\JoinColumn(name: "`attribute_id`", referencedColumnName: "`attribute_id`")]
    private ?Attribute $attribute = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Language::class)]
    #[ORM\JoinColumn(name: "`language_id`", referencedColumnName: "`language_id`")]
    private ?Language $language = null;

    #[ORM\Column(name: "`name`", type: Types::STRING, length: 64)]
    private ?string $name = null;

    /**
     * @return Attribute|null
     */
    public function getAttribute(): ?Attribute
    {
        return $this->attribute;
    }

    /**
     * @param Attribute|null $attribute
     * @return AttributeDescription
     */
    public function setAttribute(?Attribute $attribute): self
    {
        $this->attribute = $attribute;

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
     * @return AttributeDescription
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
     * @return AttributeDescription
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}