<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\PaymentMethodRepository;

/**
 * @ORM\Table(name="`synchronizer_payment_methods`")
 * @ORM\Entity(repositoryClass=PaymentMethodRepository::class)
 */
class PaymentMethod
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer", name="`back_id`")
     */
    private ?int $backId = null;

    /**
     * @ORM\Id()
     * @ORM\Column(type="string", name="`front_code`", length=255)
     */
    private ?string $frontCode = null;

    /**
     * @return int|null
     */
    public function getBackId(): ?int
    {
        return $this->backId;
    }

    /**
     * @param int|null $backId
     * @return PaymentMethod
     */
    public function setBackId(?int $backId): self
    {
        $this->backId = $backId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFrontCode(): ?string
    {
        return $this->frontCode;
    }

    /**
     * @param string|null $frontCode
     * @return PaymentMethod
     */
    public function setFrontCode(?string $frontCode): self
    {
        $this->frontCode = $frontCode;

        return $this;
    }
}