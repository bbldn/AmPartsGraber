<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductOptionRepository;

#[ORM\Table(name: "`oc_product_option`")]
#[ORM\Entity(repositoryClass: ProductOptionRepository::class)]
class ProductOption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`product_option_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(name: "`product_id`", referencedColumnName: "`product_id`", nullable: true)]
    private ?Product $product = null;

    #[ORM\ManyToOne(targetEntity: Option::class)]
    #[ORM\JoinColumn(name: "`option_id`", referencedColumnName: "`option_id`", nullable: true)]
    private ?Option $option = null;

    #[ORM\Column(name: "`value`", type: Types::TEXT)]
    private ?string $value = null;

    #[ORM\Column(name: "`required`", type: Types::BOOLEAN)]
    private ?bool $required = null;

    /** @var Collection<int, ProductOptionValue> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "product",
        cascade: ["persist", "remove"],
        targetEntity: ProductOptionValue::class,
    )]
    private Collection $values;

    public function __construct()
    {
        $this->values = new ArrayCollection();
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
     * @return ProductOption
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     * @return ProductOption
     */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;

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
     * @return ProductOption
     */
    public function setOption(?Option $option): self
    {
        $this->option = $option;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     * @return ProductOption
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequired(): ?bool
    {
        return $this->required;
    }

    /**
     * @param bool|null $required
     * @return ProductOption
     */
    public function setRequired(?bool $required): self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * @return Collection<int, ProductOptionValue>
     */
    public function getValues(): Collection
    {
        return $this->values;
    }
}