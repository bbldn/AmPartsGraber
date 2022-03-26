<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OrderSimpleFieldsRepository;

/**
 * @ORM\Table(name="`oc_order_simple_fields`")
 * @ORM\Entity(repositoryClass=OrderSimpleFieldsRepository::class)
 */
class OrderSimpleFields
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Order::class)
     * @ORM\JoinColumn(name="`order_id`", referencedColumnName="`order_id`")
     */
    private ?Order $order = null;

    /**
     * @ORM\Column(type="text", name="`metadata`")
     */
    private ?string $metadata = null;

    /**
     * @ORM\Column(type="text", name="`oblast`", nullable=true)
     */
    private ?string $oblast = null;

    /**
     * @ORM\Column(type="text", name="`gorod`", nullable=true)
     */
    private ?string $gorod = null;

    /**
     * @ORM\Column(type="text", name="`otdelenie`", nullable=true)
     */
    private ?string $otdelenie = null;

    /**
     * @return Order|null
     */
    public function getOrder(): ?Order
    {
        return $this->order;
    }

    /**
     * @param Order|null $order
     * @return OrderSimpleFields
     */
    public function setOrder(?Order $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetadata(): ?string
    {
        return $this->metadata;
    }

    /**
     * @param string|null $metadata
     * @return OrderSimpleFields
     */
    public function setMetadata(?string $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOblast(): ?string
    {
        return $this->oblast;
    }

    /**
     * @param string|null $oblast
     * @return OrderSimpleFields
     */
    public function setOblast(?string $oblast): self
    {
        $this->oblast = $oblast;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGorod(): ?string
    {
        return $this->gorod;
    }

    /**
     * @param string|null $gorod
     * @return OrderSimpleFields
     */
    public function setGorod(?string $gorod): self
    {
        $this->gorod = $gorod;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOtdelenie(): ?string
    {
        return $this->otdelenie;
    }

    /**
     * @param string|null $otdelenie
     * @return OrderSimpleFields
     */
    public function setOtdelenie(?string $otdelenie): self
    {
        $this->otdelenie = $otdelenie;

        return $this;
    }
}