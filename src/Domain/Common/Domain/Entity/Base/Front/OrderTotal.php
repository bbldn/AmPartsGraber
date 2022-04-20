<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OrderTotalRepository;

#[ORM\Table(name: "`oc_order_total`")]
#[ORM\Entity(repositoryClass: OrderTotalRepository::class)]
class OrderTotal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`order_total_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Order::class)]
    #[ORM\JoinColumn(name: "`order_id`", referencedColumnName: "`order_id`", nullable: true)]
    private ?Order $order = null;

    #[ORM\Column(name: "`code`", type: Types::STRING, length: 32)]
    private ?string $code = null;

    #[ORM\Column(name: "`title`", type: Types::STRING, length: 255)]
    private ?string $title = null;

    #[ORM\Column(name: "`value`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,4)', options: ["default" => 0])]
    private ?float $value = 0.0;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER)]
    private ?int $sortOrder = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return OrderTotal
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
     * @return OrderTotal
     */
    public function setOrder(?Order $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     * @return OrderTotal
     */
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return OrderTotal
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

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
     * @return OrderTotal
     */
    public function setValue(?float $value): self
    {
        $this->value = $value;

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
     * @return OrderTotal
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }
}