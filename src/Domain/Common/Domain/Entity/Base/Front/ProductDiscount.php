<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductDiscountRepository;

/**
 * @ORM\Table(name="`oc_product_discount`")
 * @ORM\Entity(repositoryClass=ProductDiscountRepository::class)
 */
class ProductDiscount
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`product_discount_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class)
     * @ORM\JoinColumn(name="`product_id`", referencedColumnName="`product_id`")
     */
    private ?Product $product = null;

    /**
     * @ORM\ManyToOne(targetEntity=CustomerGroup::class)
     * @ORM\JoinColumn(name="`customer_group_id`", referencedColumnName="`customer_group_id`")
     */
    private ?CustomerGroup $customerGroup = null;

    /**
     * @ORM\Column(type="integer", name="`quantity`", options={"default": 0})
     */
    private ?int $quantity = 0;

    /**
     * @ORM\Column(type="integer", name="`priority`", options={"default": 1})
     */
    private ?int $priority = 1;

    /**
     * @var float|null $price
     * @ORM\Column(type="float", name="`price`", options={"default": 0})
     */
    private ?float $price = 0.0;

    /**
     * @ORM\Column(type="date_immutable", name="`date_start`")
     */
    private ?DateTimeImmutable $dateStart = null;

    /**
     * @ORM\Column(type="date_immutable", name="`date_end`")
     */
    private ?DateTimeImmutable $dateEnd = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return ProductDiscount
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
     * @return ProductDiscount
     */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return CustomerGroup|null
     */
    public function getCustomerGroup(): ?CustomerGroup
    {
        return $this->customerGroup;
    }

    /**
     * @param CustomerGroup|null $customerGroup
     * @return ProductDiscount
     */
    public function setCustomerGroup(?CustomerGroup $customerGroup): self
    {
        $this->customerGroup = $customerGroup;

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
     * @return ProductDiscount
     */
    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPriority(): ?int
    {
        return $this->priority;
    }

    /**
     * @param int|null $priority
     * @return ProductDiscount
     */
    public function setPriority(?int $priority): self
    {
        $this->priority = $priority;

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
     * @return ProductDiscount
     */
    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDateStart(): ?DateTimeImmutable
    {
        return $this->dateStart;
    }

    /**
     * @param DateTimeImmutable|null $dateStart
     * @return ProductDiscount
     */
    public function setDateStart(?DateTimeImmutable $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDateEnd(): ?DateTimeImmutable
    {
        return $this->dateEnd;
    }

    /**
     * @param DateTimeImmutable|null $dateEnd
     * @return ProductDiscount
     */
    public function setDateEnd(?DateTimeImmutable $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }
}