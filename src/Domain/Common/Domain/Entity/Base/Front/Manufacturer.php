<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ManufacturerRepository;

#[ORM\Table(name: "`oc_manufacturer`")]
#[ORM\Index(name: "back_id_idx", columns: ["back_id"])]
#[ORM\Entity(repositoryClass: ManufacturerRepository::class)]
class Manufacturer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`manufacturer_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: "`name`", type: Types::STRING, length: 64)]
    private ?string $name = null;

    #[ORM\Column(name: "`image`", type: Types::STRING, length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER)]
    private ?int $sortOrder = null;

    #[ORM\Column(name: "`faq_name`", type: Types::STRING, length: 255, nullable: true)]
    private ?string $faqName = null;

    #[ORM\Column(name: "`back_id`", type: Types::INTEGER, nullable: true)]
    private ?int $backId = null;

    /** @var Collection<int, Shop> */
    #[ORM\ManyToMany(targetEntity: Shop::class, fetch: "EXTRA_LAZY")]
    #[ORM\JoinTable(name: "oc_manufacturer_to_store")]
    #[ORM\InverseJoinColumn(name: "store_id", referencedColumnName: "`store_id`")]
    #[ORM\JoinColumn(name: "manufacturer_id", referencedColumnName: "`manufacturer_id`")]
    private Collection $shops;

    /** @var Collection<int, ManufacturerFaq> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "manufacturer",
        cascade: ["persist", "remove"],
        targetEntity: ManufacturerFaq::class
    )]
    private Collection $manufacturerFaqs;

    public function __construct()
    {
        $this->shops = new ArrayCollection();
        $this->manufacturerFaqs = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
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
     * @return Manufacturer
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     * @return Manufacturer
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;

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
     * @return Manufacturer
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFaqName(): ?string
    {
        return $this->faqName;
    }

    /**
     * @param string|null $faqName
     * @return Manufacturer
     */
    public function setFaqName(?string $faqName): self
    {
        $this->faqName = $faqName;

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
     * @return Manufacturer
     */
    public function setBackId(?int $backId): self
    {
        $this->backId = $backId;

        return $this;
    }

    /**
     * @return Collection<int, Shop>
     */
    public function getShops(): Collection
    {
        return $this->shops;
    }

    /**
     * @return Collection<int, ManufacturerFaq>
     */
    public function getManufacturerFaqs(): Collection
    {
        return $this->manufacturerFaqs;
    }
}