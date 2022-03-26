<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ShippingCourierRepository;

/**
 * @ORM\Table(name="`oc_order_shipment`")
 * @ORM\Entity(repositoryClass=ShippingCourierRepository::class)
 */
class ShippingCourier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`shipping_courier_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", name="`shipping_courier_code`", length=255)
     */
    private ?string $shippingCourierCode = null;

    /**
     * @ORM\Column(type="string", name="`shipping_courier_name`", length=255)
     */
    private ?string $shippingCourierName = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return ShippingCourier
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingCourierCode(): ?string
    {
        return $this->shippingCourierCode;
    }

    /**
     * @param string|null $shippingCourierCode
     * @return ShippingCourier
     */
    public function setShippingCourierCode(?string $shippingCourierCode): self
    {
        $this->shippingCourierCode = $shippingCourierCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingCourierName(): ?string
    {
        return $this->shippingCourierName;
    }

    /**
     * @param string|null $shippingCourierName
     * @return ShippingCourier
     */
    public function setShippingCourierName(?string $shippingCourierName): self
    {
        $this->shippingCourierName = $shippingCourierName;

        return $this;
    }
}