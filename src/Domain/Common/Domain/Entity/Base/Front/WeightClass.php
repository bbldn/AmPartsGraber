<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\WeightClassRepository;

/**
 * @ORM\Table(name="`oc_weight_class`")
 * @ORM\Entity(repositoryClass=WeightClassRepository::class)
 */
class WeightClass
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`weight_class_id`")
     */
    private ?int $id = null;

    /**
     * @var float|null $weight
     * @ORM\Column(type="float", name="`value`", options={"default": 0})
     */
    private ?float $value = 0.0;

    /**
     * @var Collection|WeightClassDescription[]
     * @ORM\OneToMany(
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true,
     *     mappedBy="weightClass",
     *     cascade={"persist", "remove"},
     *     targetEntity=WeightClassDescription::class
     * )
     *
     * @psalm-var Collection<int, WeightClassDescription>
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
     * @return WeightClass
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
     * @return WeightClass
     */
    public function setValue(?float $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return WeightClassDescription[]|Collection
     *
     * @psalm-return Collection<int, WeightClassDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}