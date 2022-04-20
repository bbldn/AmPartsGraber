<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ShippingCourierRepository;

#[ORM\Table(name: "`oc_shipping_courier`")]
#[ORM\Entity(repositoryClass: ShippingCourierRepository::class)]
class ShippingCourier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`shipping_courier_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: "`shipping_courier_code`", type: Types::STRING, length: 255)]
    private ?string $shippingCourierCode = null;

    #[ORM\Column(name: "`shipping_courier_name`", type: Types::STRING, length: 255)]
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