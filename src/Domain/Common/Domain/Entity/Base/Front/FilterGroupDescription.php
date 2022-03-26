<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\FilterGroupDescriptionRepository;

/**
 * @ORM\Table(name="`oc_filter_group_description`")
 * @ORM\Entity(repositoryClass=FilterGroupDescriptionRepository::class)
 */
class FilterGroupDescription
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=FilterGroup::class, inversedBy="descriptions")
     * @ORM\JoinColumn(name="`filter_group_id`", referencedColumnName="`filter_group_id`")
     */
    private ?FilterGroup $filterGroup = null;

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
     * @return FilterGroup|null
     */
    public function getFilterGroup(): ?FilterGroup
    {
        return $this->filterGroup;
    }

    /**
     * @param FilterGroup|null $filterGroup
     * @return FilterGroupDescription
     */
    public function setFilterGroup(?FilterGroup $filterGroup): self
    {
        $this->filterGroup = $filterGroup;

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
     * @return FilterGroupDescription
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
     * @return FilterGroupDescription
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}