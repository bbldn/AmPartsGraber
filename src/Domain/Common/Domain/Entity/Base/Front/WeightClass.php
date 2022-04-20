<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\WeightClassRepository;

#[ORM\Table(name: "`oc_weight_class`")]
#[ORM\Entity(repositoryClass: WeightClassRepository::class)]
class WeightClass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`weight_class_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: "`value`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,8)', options: ["default" => 0])]
    private ?float $value = 0.0;

    /** @var Collection<int, WeightClassDescription> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "weightClass",
        cascade: ["persist", "remove"],
        targetEntity: WeightClassDescription::class
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
     * @return Collection<int, WeightClassDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}