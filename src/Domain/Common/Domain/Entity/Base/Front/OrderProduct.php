<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OrderProductRepository;

#[ORM\Table(name: "`oc_order_product`")]
#[ORM\Entity(repositoryClass: OrderProductRepository::class)]
class OrderProduct
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`order_product_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Order::class)]
    #[ORM\JoinColumn(name: "`order_id`", referencedColumnName: "`order_id`", nullable: true)]
    private ?Order $order = null;

    #[ORM\ManyToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(name: "`product_id`", referencedColumnName: "`product_id`", nullable: true)]
    private ?Product $product = null;

    #[ORM\Column(name: "`name`", type: Types::STRING, length: 255)]
    private ?string $name = null;

    #[ORM\Column(name: "`model`", type: Types::STRING, length: 64)]
    private ?string $model = null;

    #[ORM\Column(name: "`quantity`", type: Types::INTEGER)]
    private ?int $quantity = null;

    #[ORM\Column(name: "`price`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,4)', options: ["default" => 0])]
    private ?float $price = 0.0;

    #[ORM\Column(name: "`total`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,4)', options: ["default" => 0])]
    private ?float $total = 0.0;

    #[ORM\Column(name: "`tax`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,4)', options: ["default" => 0])]
    private ?float $tax = 0.0;

    #[ORM\Column(name: "`reward`", type: Types::INTEGER)]
    private ?int $reward = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return OrderProduct
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
     * @return OrderProduct
     */
    public function setOrder(?Order $order): self
    {
        $this->order = $order;

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
     * @return OrderProduct
     */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;

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
     * @return OrderProduct
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string|null $model
     * @return OrderProduct
     */
    public function setModel(?string $model): self
    {
        $this->model = $model;

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
     * @return OrderProduct
     */
    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

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
     * @return OrderProduct
     */
    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

    /**
     * @param float|null $total
     * @return OrderProduct
     */
    public function setTotal(?float $total): self
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTax(): ?float
    {
        return $this->tax;
    }

    /**
     * @param float|null $tax
     * @return OrderProduct
     */
    public function setTax(?float $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getReward(): ?int
    {
        return $this->reward;
    }

    /**
     * @param int|null $reward
     * @return OrderProduct
     */
    public function setReward(?int $reward): self
    {
        $this->reward = $reward;

        return $this;
    }
}