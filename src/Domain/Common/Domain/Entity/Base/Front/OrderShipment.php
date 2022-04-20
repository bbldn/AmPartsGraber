<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OrderShipmentRepository;

#[ORM\HasLifecycleCallbacks]
#[ORM\Table(name: "`oc_order_shipment`")]
#[ORM\Entity(repositoryClass: OrderShipmentRepository::class)]
class OrderShipment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`order_shipment_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Order::class)]
    #[ORM\JoinColumn(name: "`order_id`", referencedColumnName: "`order_id`", nullable: true)]
    private ?Order $order = null;

    #[ORM\Column(name: "`date_added`", type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $dateAdded = null;

    #[ORM\ManyToOne(targetEntity: ShippingCourier::class)]
    #[ORM\JoinColumn(name: "`shipping_courier_id`", referencedColumnName: "`shipping_courier_id`", nullable: true)]
    private ?ShippingCourier $shippingCourier = null;

    #[ORM\Column(name: "`tracking_number`", type: Types::STRING, length: 255)]
    private ?string $trackingNumber = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return OrderShipment
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
     * @return OrderShipment
     */
    public function setOrder(?Order $order): self
    {
        $this->order = $order;

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
     * @return OrderShipment
     */
    public function setDateAdded(?DateTimeImmutable $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * @return ShippingCourier|null
     */
    public function getShippingCourier(): ?ShippingCourier
    {
        return $this->shippingCourier;
    }

    /**
     * @param ShippingCourier|null $shippingCourier
     * @return OrderShipment
     */
    public function setShippingCourier(?ShippingCourier $shippingCourier): self
    {
        $this->shippingCourier = $shippingCourier;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    /**
     * @param string|null $trackingNumber
     * @return OrderShipment
     */
    public function setTrackingNumber(?string $trackingNumber): self
    {
        $this->trackingNumber = $trackingNumber;

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