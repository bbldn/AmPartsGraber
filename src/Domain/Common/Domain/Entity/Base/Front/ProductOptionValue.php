<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductOptionValueRepository;

/**
 * @ORM\Table(name="`oc_product_option_value`")
 * @ORM\Entity(repositoryClass=ProductOptionValueRepository::class)
 */
class ProductOptionValue
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`product_option_value_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity=ProductOption::class)
     * @ORM\JoinColumn(name="`product_option_id`", referencedColumnName="`product_id`")
     */
    private ?ProductOption $productOption = null;

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
     * @ORM\ManyToOne(targetEntity=OptionValue::class)
     * @ORM\JoinColumn(name="`option_value_id`", referencedColumnName="`option_value_id`")
     */
    private ?OptionValue $optionValue = null;

    /**
     * @ORM\Column(type="integer", name="`quantity`")
     */
    private ?int $quantity = null;

    /**
     * @ORM\Column(type="boolean", name="`subtract`")
     */
    private ?bool $subtract = null;

    /**
     * @ORM\Column(type="float", name="`price`")
     */
    private ?float $price = null;

    /**
     * @ORM\Column(type="string", name="`price_prefix`", length=1)
     */
    private ?string $pricePrefix = null;

    /**
     * @ORM\Column(type="integer", name="`points`")
     */
    private ?int $points = null;

    /**
     * @ORM\Column(type="string", name="`points_prefix`", length=1)
     */
    private ?string $pointsPrefix = null;

    /**
     * @ORM\Column(type="float", name="`weight`")
     */
    private ?float $weight = null;

    /**
     * @ORM\Column(type="string", name="`weight_prefix`", length=1)
     */
    private ?string $weightPrefix = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return ProductOptionValue
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return ProductOption|null
     */
    public function getProductOption(): ?ProductOption
    {
        return $this->productOption;
    }

    /**
     * @param ProductOption|null $productOption
     * @return ProductOptionValue
     */
    public function setProductOption(?ProductOption $productOption): self
    {
        $this->productOption = $productOption;

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
     * @return ProductOptionValue
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
     * @return ProductOptionValue
     */
    public function setOption(?Option $option): self
    {
        $this->option = $option;

        return $this;
    }

    /**
     * @return OptionValue|null
     */
    public function getOptionValue(): ?OptionValue
    {
        return $this->optionValue;
    }

    /**
     * @param OptionValue|null $optionValue
     * @return ProductOptionValue
     */
    public function setOptionValue(?OptionValue $optionValue): self
    {
        $this->optionValue = $optionValue;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     * @return ProductOptionValue
     */
    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSubtract(): ?bool
    {
        return $this->subtract;
    }

    /**
     * @param bool|null $subtract
     * @return ProductOptionValue
     */
    public function setSubtract(?bool $subtract): self
    {
        $this->subtract = $subtract;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return ProductOptionValue
     */
    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPricePrefix(): ?string
    {
        return $this->pricePrefix;
    }

    /**
     * @param string|null $pricePrefix
     * @return ProductOptionValue
     */
    public function setPricePrefix(?string $pricePrefix): self
    {
        $this->pricePrefix = $pricePrefix;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPoints(): ?int
    {
        return $this->points;
    }

    /**
     * @param int|null $points
     * @return ProductOptionValue
     */
    public function setPoints(?int $points): self
    {
        $this->points = $points;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPointsPrefix(): ?string
    {
        return $this->pointsPrefix;
    }

    /**
     * @param string|null $pointsPrefix
     * @return ProductOptionValue
     */
    public function setPointsPrefix(?string $pointsPrefix): self
    {
        $this->pointsPrefix = $pointsPrefix;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * @param float|null $weight
     * @return ProductOptionValue
     */
    public function setWeight(?float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWeightPrefix(): ?string
    {
        return $this->weightPrefix;
    }

    /**
     * @param string|null $weightPrefix
     * @return ProductOptionValue
     */
    public function setWeightPrefix(?string $weightPrefix): self
    {
        $this->weightPrefix = $weightPrefix;

        return $this;
    }
}