<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OptionValueRepository;

#[ORM\Table(name: "`oc_option_value`")]
#[ORM\Index(name: "back_id_idx", columns: ["back_id"])]
#[ORM\Entity(repositoryClass: OptionValueRepository::class)]
class OptionValue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`option_value_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Option::class)]
    #[ORM\JoinColumn(name: "`option_id`", referencedColumnName: "`option_id`", nullable: true)]
    private ?Option $option = null;

    #[ORM\Column(name: "`image`", type: Types::STRING, length: 255)]
    private ?string $image = null;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER)]
    private ?int $sortOrder = null;

    #[ORM\Column(name: "`back_id`", type: Types::INTEGER, nullable: true)]
    private ?int $backId = null;

    /** @var Collection<int, OptionValueDescription> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "optionValue",
        cascade: ["persist", "remove"],
        targetEntity: OptionValueDescription::class
    )]
    private Collection $descriptions;

    public function __construct()
    {
        $this->descriptions = new ArrayCollection();
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
     * @return OptionValue
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Option|null
     */
    public function getOption(): ?Option
    {
        return $this->option;
    }

    /**
     * @param Option|null $option
     * @return OptionValue
     */
    public function setOption(?Option $option): self
    {
        $this->option = $option;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     * @return OptionValue
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;

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
     * @return OptionValue
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
     * @return OptionValue
     */
    public function setBackId(?int $backId): self
    {
        $this->backId = $backId;

        return $this;
    }

    /**
     * @return Collection<int, OptionValueDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}