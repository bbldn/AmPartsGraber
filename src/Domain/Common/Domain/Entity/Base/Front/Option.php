<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OptionRepository;

#[ORM\Table(name: "`oc_option`")]
#[ORM\Index(name: "back_id_idx", columns: ["back_id"])]
#[ORM\Entity(repositoryClass: OptionRepository::class)]
class Option
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`option_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: "`type`", type: Types::STRING, length: 32)]
    private ?string $type = null;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER)]
    private ?int $sortOrder = null;

    #[ORM\Column(name: "`back_id`", type: Types::INTEGER, nullable: true)]
    private ?int $backId = null;

    /** @var Collection<int, OptionDescription> */
    #[ORM\OneToMany(
        mappedBy: "option",
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        cascade: ["persist", "remove"],
        targetEntity: OptionDescription::class
    )]
    private Collection $descriptions;

    /** @var Collection<int, OptionValue> */
    #[ORM\OneToMany(
        mappedBy: "option",
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        cascade: ["persist", "remove"],
        targetEntity: OptionValue::class
    )]
    private Collection $optionValues;

    public function __construct()
    {
        $this->descriptions = new ArrayCollection();
        $this->optionValues = new ArrayCollection();
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
     * @return Option
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
     * @return Option
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

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
     * @return Option
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBackId(): ?int
    {
        return $this->backId;
    }

    /**
     * @param int|null $backId
     * @return Option
     */
    public function setBackId(?int $backId): Option
    {
        $this->backId = $backId;

        return $this;
    }

    /**
     * @return Collection<int, OptionDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }

    /**
     * @return Collection<int, OptionValue>
     */
    public function getOptionValues(): Collection
    {
        return $this->optionValues;
    }
}