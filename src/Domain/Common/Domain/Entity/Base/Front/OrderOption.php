<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OrderOptionRepository;

#[ORM\Table(name: "`oc_order_option`")]
#[ORM\Entity(repositoryClass: OrderOptionRepository::class)]
class OrderOption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`order_option_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Order::class)]
    #[ORM\JoinColumn(name: "`order_id`", referencedColumnName: "`order_id`", nullable: true)]
    private ?Order $order = null;

    #[ORM\ManyToOne(targetEntity: OrderProduct::class)]
    #[ORM\JoinColumn(name: "`order_product_id`", referencedColumnName: "`order_product_id`", nullable: true)]
    private ?OrderProduct $orderProduct = null;

    #[ORM\ManyToOne(targetEntity: ProductOption::class)]
    #[ORM\JoinColumn(name: "`product_option_id`", referencedColumnName: "`product_option_id`", nullable: true)]
    private ?ProductOption $productOption = null;

    #[ORM\ManyToOne(targetEntity: ProductOptionValue::class)]
    #[ORM\JoinColumn(name: "`product_option_value_id`", referencedColumnName: "`product_option_value_id`", nullable: true)]
    private ?ProductOptionValue $productOptionValue = null;

    #[ORM\Column(name: "`name`", type: Types::STRING, length: 255)]
    private ?string $name = null;

    #[ORM\Column(name: "`value`", type: Types::TEXT)]
    private ?string $value = null;

    #[ORM\Column(name: "`type`", type: Types::STRING, length: 32)]
    private ?string $type = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return OrderOption
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Order|null
     */
    public function getOrder(): ?Order
    {
        return $this->order;
    }

    /**
     * @param Order|null $order
     * @return OrderOption
     */
    public function setOrder(?Order $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return OrderProduct|null
     */
    public function getOrderProduct(): ?OrderProduct
    {
        return $this->orderProduct;
    }

    /**
     * @param OrderProduct|null $orderProduct
     * @return OrderOption
     */
    public function setOrderProduct(?OrderProduct $orderProduct): self
    {
        $this->orderProduct = $orderProduct;

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
     * @return OrderOption
     */
    public function setProductOption(?ProductOption $productOption): self
    {
        $this->productOption = $productOption;

        return $this;
    }

    /**
     * @return ProductOptionValue|null
     */
    public function getProductOptionValue(): ?ProductOptionValue
    {
        return $this->productOptionValue;
    }

    /**
     * @param ProductOptionValue|null $productOptionValue
     * @return OrderOption
     */
    public function setProductOptionValue(?ProductOptionValue $productOptionValue): self
    {
        $this->productOptionValue = $productOptionValue;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return OrderOption
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

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
     * @return OrderOption
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;

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
     * @return OrderOption
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }
}