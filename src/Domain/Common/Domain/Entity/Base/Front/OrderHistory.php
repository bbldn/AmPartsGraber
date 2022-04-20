<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OrderHistoryRepository;

#[ORM\HasLifecycleCallbacks]
#[ORM\Table(name: "`oc_order_history`")]
#[ORM\Entity(repositoryClass: OrderHistoryRepository::class)]
class OrderHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`order_history_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Order::class)]
    #[ORM\JoinColumn(name: "`order_id`", referencedColumnName: "`order_id`", nullable: true)]
    private ?Order $order = null;

    #[ORM\ManyToOne(targetEntity: OrderStatus::class)]
    #[ORM\JoinColumn(name: "`order_status_id`", referencedColumnName: "`order_status_id`", nullable: true)]
    private ?OrderStatus $orderStatus = null;

    #[ORM\Column(name: "`notify`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?int $notify = 0;

    #[ORM\Column(name: "`comment`", type: Types::TEXT)]
    private ?string $comment = null;

    #[ORM\Column(name: "`date_added`", type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $dateAdded = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return OrderHistory
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
     * @return OrderHistory
     */
    public function setOrder(?Order $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return OrderStatus|null
     */
    public function getOrderStatus(): ?OrderStatus
    {
        return $this->orderStatus;
    }

    /**
     * @param OrderStatus|null $orderStatus
     * @return OrderHistory
     */
    public function setOrderStatus(?OrderStatus $orderStatus): self
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNotify(): ?int
    {
        return $this->notify;
    }

    /**
     * @param int|null $notify
     * @return OrderHistory
     */
    public function setNotify(?int $notify): self
    {
        $this->notify = $notify;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     * @return OrderHistory
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDateAdded(): ?DateTimeImmutable
    {
        return $this->dateAdded;
    }

    /**
     * @param DateTimeImmutable|null $dateAdded
     * @return OrderHistory
     */
    public function setDateAdded(?DateTimeImmutable $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    #[ORM\PreUpdate]
    #[ORM\PrePersist]
    public function updatedTimestamps(): void
    {
        if (null === $this->getDateAdded()) {
            $this->setDateAdded(new DateTimeImmutable());
        }
    }
}