<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductOptionRepository;
use App\Domain\Common\Domain\Entity\Base\Front\ProductCategory as ProductToCategory;

/**
 * @ORM\Table(name="`oc_product_option`")
 * @ORM\Entity(repositoryClass=ProductOptionRepository::class)
 */
class ProductOption
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`product_option_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class)
     * @ORM\JoinColumn(name="`product_id`", referencedColumnName="`product_id`")
     */
    private ?Product $product = null;

    /**
     * @ORM\ManyToOne(targetEntity=Option::class)
     * @ORM\JoinColumn(name="`option_id`", referencedColumnName="`option_id`")
     */
    private ?Option $option = null;

    /**
     * @ORM\Column(type="string", name="`value`", length=255)
     */
    private ?string $value = null;

    /**
     * @ORM\Column(type="boolean", name="`required`")
     */
    private ?bool $required = null;

    /**
     * @var Collection|ProductOptionValue[]
     * @ORM\OneToMany(
     *     mappedBy="product",
     *     orphanRemoval=true,
     *     fetch="EXTRA_LAZY",
     *     cascade={"persist", "remove"},
     *     targetEntity=ProductOptionValue::class
     * )
     *
     * @psalm-var Collection<int, ProductOptionValue>
     */
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
     * @return ProductOptionValue[]|Collection
     *
     * @psalm-return Collection<int, ProductOptionValue>
     */
    public function getValues(): Collection
    {
        return $this->values;
    }
}