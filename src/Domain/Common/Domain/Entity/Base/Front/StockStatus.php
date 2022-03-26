<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\StockStatusRepository;

/**
 * @ORM\Table(name="`oc_stock_status`")
 * @ORM\Entity(repositoryClass=StockStatusRepository::class)
 */
class StockStatus
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer", name="`stock_status_id`")
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
     * @return StockStatus
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
     * @return StockStatus
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
     * @return StockStatus
     */
    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }
}