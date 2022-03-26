<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OptionRepository;

/**
 * @ORM\Entity(repositoryClass=OptionRepository::class)
 * @ORM\Table(name="`oc_option`", indexes={@ORM\Index(name="back_id_idx", columns={"back_id"})})
 */
class Option
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`option_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", name="`type`", length=32)
     */
    private ?string $type = null;

    /**
     * @ORM\Column(type="integer", name="`sort_order`")
     */
    private ?int $sortOrder = null;

    /**
     * @ORM\Column(type="integer", name="`back_id`", nullable=true)
     */
    private ?int $backId = null;

    /**
     * @var Collection|OptionValue[]
     * @ORM\OneToMany(
     *     mappedBy="option",
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true,
     *     cascade={"persist", "remove"},
     *     targetEntity=OptionValue::class
     * )
     *
     * @psalm-var Collection<int, OptionValue>
     */
    private Collection $optionValues;

    /**
     * @var Collection|OptionDescription[]
     * @ORM\OneToMany(
     *     mappedBy="option",
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true,
     *     cascade={"persist", "remove"},
     *     targetEntity=OptionDescription::class
     * )
     *
     * @psalm-var Collection<int, OptionDescription>
     */
    private Collection $descriptions;

    public function __construct()
    {
        $this->optionValues = new ArrayCollection();
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
     * @return OptionValue[]|Collection
     *
     * @psalm-return Collection<int, OptionValue>
     */
    public function getOptionValues(): Collection
    {
        return $this->optionValues;
    }

    /**
     * @return OptionDescription[]|Collection
     *
     * @psalm-return Collection<int, OptionDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}