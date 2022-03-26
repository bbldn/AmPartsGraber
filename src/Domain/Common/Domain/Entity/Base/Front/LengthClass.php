<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\LengthClassRepository;

/**
 * @ORM\Table(name="`oc_length_class`")
 * @ORM\Entity(repositoryClass=LengthClassRepository::class)
 */
class LengthClass
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`length_class_id`")
     */
    private ?int $id = null;

    /**
     * @var float|null $weight
     * @ORM\Column(type="float", name="`value`")
     */
    private ?float $value = 0.0;

    /**
     * @var Collection|LengthClassDescription[]
     * @ORM\OneToMany(
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true,
     *     mappedBy="lengthClass",
     *     cascade={"persist", "remove"},
     *     targetEntity=LengthClassDescription::class
     * )
     *
     * @psalm-var Collection<int, LengthClassDescription>
     */
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
     * @return LengthClass
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * @param float|null $value
     * @return LengthClass
     */
    public function setValue(?float $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return LengthClassDescription[]|Collection
     *
     * @psalm-return Collection<int, LengthClassDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}