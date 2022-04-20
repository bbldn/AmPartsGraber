<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ManufacturerFaqRepository;

#[ORM\Table(name: "`oc_manufacturer_faq`")]
#[ORM\Index(name: "back_id_idx", columns: ["back_id"])]
#[ORM\Entity(repositoryClass: ManufacturerFaqRepository::class)]
class ManufacturerFaq
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`manufacturer_faq_id`", type: Types::INTEGER, options: ["unsigned" => true])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Manufacturer::class)]
    #[ORM\JoinColumn(name: "`manufacturer_id`", referencedColumnName: "`manufacturer_id`", nullable: true)]
    private ?Manufacturer $manufacturer = null;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER)]
    private ?int $sortOrder = null;

    #[ORM\Column(name: "`question`", type: Types::TEXT)]
    private ?string $question = null;

    #[ORM\Column(name: "`faq`", type: Types::TEXT, columnDefinition: 'LONGTEXT')]
    private ?string $faq = null;

    #[ORM\Column(name: "`icon`", type: Types::STRING, length: 32)]
    private ?string $icon = null;

    #[ORM\Column(name: "`back_id`", type: Types::INTEGER, nullable: true)]
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

    /**
     * @return int|null
     */
    public function getBackId(): ?int
    {
        return $this->backId;
    }

    /**
     * @param int|null $backId
     * @return ManufacturerFaq
     */
    public function setBackId(?int $backId): self
    {
        $this->backId = $backId;

        return $this;
    }
}