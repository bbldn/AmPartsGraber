<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\AttributeGroupDescriptionRepository;

/**
 * @ORM\Table(name="`oc_attribute_group_description`")
 * @ORM\Entity(repositoryClass=AttributeGroupDescriptionRepository::class)
 */
class AttributeGroupDescription
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=AttributeGroup::class, inversedBy="descriptions")
     * @ORM\JoinColumn(name="`attribute_group_id`", referencedColumnName="`attribute_group_id`")
     */
    private ?AttributeGroup $attributeGroup = null;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Language::class)
     * @ORM\JoinColumn(name="`language_id`", referencedColumnName="`language_id`")
     */
    private ?Language $language = null;

    /**
     * @ORM\Column(type="string", name="`name`", length=64)
     */
    private ?string $name = null;

    /**
     * @return AttributeGroup|null
     */
    public function getAttributeGroup(): ?AttributeGroup
    {
        return $this->attributeGroup;
    }

    /**
     * @param AttributeGroup|null $attributeGroup
     * @return AttributeGroupDescription
     */
    public function setAttributeGroup(?AttributeGroup $attributeGroup): self
    {
        $this->attributeGroup = $attributeGroup;

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
     * @return AttributeGroupDescription
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
     * @return AttributeGroupDescription
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}