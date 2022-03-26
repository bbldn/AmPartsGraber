<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OrderStatusRepository;

/**
 * @ORM\Entity(repositoryClass=OrderStatusRepository::class)
 * @ORM\Table(name="`oc_order_status`", indexes={@ORM\Index(name="back_id_idx", columns={"back_id"})})
 */
class OrderStatus
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer", name="`order_status_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", name="`name`", length=32)
     */
    private ?string $name = null;

    /**
     * @ORM\ManyToOne(targetEntity=Language::class)
     * @ORM\JoinColumn(name="`language_id`", referencedColumnName="`language_id`")
     */
    private ?Language $language = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return OrderStatus
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

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
     * @return OrderStatus
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Language|null
     */
    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    /**
     * @param Language|null $language
     * @return OrderStatus
     */
    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }
}