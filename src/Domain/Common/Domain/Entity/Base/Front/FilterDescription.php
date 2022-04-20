<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\FilterDescriptionRepository;

#[ORM\Table(name: "`oc_filter_description`")]
#[ORM\Entity(repositoryClass: FilterDescriptionRepository::class)]
class FilterDescription
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Filter::class, inversedBy: "descriptions")]
    #[ORM\JoinColumn(name: "`filter_id`", referencedColumnName: "`filter_id`")]
    private ?Filter $filter = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Language::class)]
    #[ORM\JoinColumn(name: "`language_id`", referencedColumnName: "`language_id`")]
    private ?Language $language = null;

    #[ORM\ManyToOne(targetEntity: FilterGroup::class)]
    #[ORM\JoinColumn(name: "`filter_group_id`", referencedColumnName: "`filter_group_id`", nullable: true)]
    private ?FilterGroup $filterGroup = null;

    #[ORM\Column(name: "`name`", type: Types::STRING, length: 64)]
    private ?string $name = null;

    /**
     * @return Filter|null
     */
    public function getFilter(): ?Filter
    {
        return $this->filter;
    }

    /**
     * @param Filter|null $filter
     * @return FilterDescription
     */
    public function setFilter(?Filter $filter): self
    {
        $this->filter = $filter;

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
     * @return FilterDescription
     */
    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return FilterGroup|null
     */
    public function getFilterGroup(): ?FilterGroup
    {
        return $this->filterGroup;
    }

    /**
     * @param FilterGroup|null $filterGroup
     * @return FilterDescription
     */
    public function setFilterGroup(?FilterGroup $filterGroup): self
    {
        $this->filterGroup = $filterGroup;

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
     * @return FilterDescription
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}