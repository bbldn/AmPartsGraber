<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ManufacturerFaqRepository;

/**
 * @ORM\Entity(repositoryClass=ManufacturerFaqRepository::class)
 * @ORM\Table(name="`oc_manufacturer_faq`", indexes={@ORM\Index(name="back_id_idx", columns={"back_id"})})
 */
class ManufacturerFaq
{
    /**
     * Идентификатор
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`manufacturer_faq_id`", options={"unsigned":true})
     */
    private ?int $id = null;

    /**
     * Производитель
     * @ORM\ManyToOne(targetEntity=Manufacturer::class, cascade={"persist"})
     * @ORM\JoinColumn(name="`manufacturer_id`", referencedColumnName="`manufacturer_id`")
     */
    private ?Manufacturer $manufacturer = null;

    /**
     * Порядок сортировки
     * @ORM\Column(type="integer", name="`sort_order`", options={"default":0})
     */
    private ?int $sortOrder = 0;

    /**
     * Вопрос
     * @ORM\Column(type="text", name="`question`", nullable=true)
     */
    private ?string $question = null;

    /**
     * Вопрос
     * @ORM\Column(type="text", name="`faq`", nullable=true)
     */
    private ?string $faq = null;

    /**
     * Название
     * @ORM\Column(type="string", name="`icon`", length=32, nullable=true)
     */
    private ?string $icon = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return ManufacturerFaq
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Manufacturer|null
     */
    public function getManufacturer(): ?Manufacturer
    {
        return $this->manufacturer;
    }

    /**
     * @param Manufacturer|null $manufacturer
     * @return ManufacturerFaq
     */
    public function setManufacturer(?Manufacturer $manufacturer): self
    {
        $this->manufacturer = $manufacturer;

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
     * @return ManufacturerFaq
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuestion(): ?string
    {
        return $this->question;
    }

    /**
     * @param string|null $question
     * @return ManufacturerFaq
     */
    public function setQuestion(?string $question): self
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFaq(): ?string
    {
        return $this->faq;
    }

    /**
     * @param string|null $faq
     * @return ManufacturerFaq
     */
    public function setFaq(?string $faq): self
    {
        $this->faq = $faq;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param string|null $icon
     * @return ManufacturerFaq
     */
    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }
}