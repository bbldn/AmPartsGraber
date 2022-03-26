<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ShopRepository;

/**
 * @ORM\Entity(repositoryClass=ShopRepository::class)
 * @ORM\Table(name="`oc_store`", indexes={@ORM\Index(name="back_id_idx", columns={"back_id"})})
 */
class Shop
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`store_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", name="`name`", length=64)
     */
    private ?string $name = null;

    /**
     * @ORM\Column(type="string", name="`url`", length=255)
     */
    private ?string $url = null;

    /**
     * @ORM\Column(type="string", name="`ssl`", length=255)
     */
    private ?string $ssl = null;

    /**
     * @ORM\Column(type="integer", name="`back_id`", nullable=true)
     */
    private ?int $backId = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Shop
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
     * @return Shop
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return Shop
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSsl(): ?string
    {
        return $this->ssl;
    }

    /**
     * @param string|null $ssl
     * @return Shop
     */
    public function setSsl(?string $ssl): self
    {
        $this->ssl = $ssl;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBackId(): ?int
    {
        return $this->backId;
    }

    /**
     * @param int|null $backId
     * @return Shop
     */
    public function setBackId(?int $backId): self
    {
        $this->backId = $backId;

        return $this;
    }
}