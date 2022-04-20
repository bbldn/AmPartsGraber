<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductRepository;
use App\Domain\Common\Domain\Entity\Base\Front\ProductCategory as ProductToCategory;

#[ORM\HasLifecycleCallbacks]
#[ORM\Table(name: "`oc_product`")]
#[ORM\Index(name: "back_id_idx", columns: ["back_id"])]
#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`product_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: "`model`", type: Types::STRING, length: 64)]
    private ?string $model = null;

    #[ORM\Column(name: "`sku`", type: Types::STRING, length: 64)]
    private ?string $sku = null;

    #[ORM\Column(name: "`upc`", type: Types::STRING, length: 12)]
    private ?string $upc = null;

    #[ORM\Column(name: "`ean`", type: Types::STRING, length: 14)]
    private ?string $ean = null;

    #[ORM\Column(name: "`jan`", type: Types::STRING, length: 13)]
    private ?string $jan = null;

    #[ORM\Column(name: "`isbn`", type: Types::STRING, length: 17)]
    private ?string $isbn = null;

    #[ORM\Column(name: "`mpn`", type: Types::STRING, length: 64)]
    private ?string $mpn = null;

    #[ORM\Column(name: "`location`", type: Types::STRING, length: 128)]
    private ?string $location = null;

    #[ORM\Column(name: "`quantity`", type: Types::INTEGER, options: ["default" => 0])]
    private ?int $quantity = 0;

    #[ORM\ManyToOne(targetEntity: StockStatus::class)]
    #[ORM\JoinColumn(name: "`stock_status_id`", referencedColumnName: "`stock_status_id`", nullable: true)]
    private ?StockStatus $stockStatus = null;

    #[ORM\Column(name: "`image`", type: Types::STRING, length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\ManyToOne(targetEntity: Manufacturer::class)]
    #[ORM\JoinColumn(name: "`manufacturer_id`", referencedColumnName: "`manufacturer_id`", nullable: true)]
    private ?Manufacturer $manufacturer = null;

    #[ORM\Column(name: "`shipping`", type: Types::BOOLEAN, options: ["default" => 1])]
    private ?bool $shipping = true;

    #[ORM\Column(name: "`price`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,4)', options: ["default" => 0])]
    private ?float $price = 0.0;

    #[ORM\Column(name: "`points`", type: Types::INTEGER, options: ["default" => 0])]
    private ?int $points = 0;

    #[ORM\ManyToOne(targetEntity: TaxClass::class)]
    #[ORM\JoinColumn(name: "`tax_class_id`", referencedColumnName: "`tax_class_id`", nullable: true)]
    private ?TaxClass $taxClass = null;

    #[ORM\Column(name: "`date_available`", type: Types::DATE_IMMUTABLE, options: ["default" => '1970-01-01'])]
    private ?DateTimeImmutable $dateAvailable = null;

    #[ORM\Column(name: "`weight`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,8)', options: ["default" => 0])]
    private ?float $weight = 0.0;

    #[ORM\ManyToOne(targetEntity: WeightClass::class)]
    #[ORM\JoinColumn(name: "`weight_class_id`", referencedColumnName: "`weight_class_id`", nullable: true)]
    private ?WeightClass $weightClass = null;

    #[ORM\Column(name: "`length`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,8)', options: ["default" => 0])]
    private ?float $length = 0.0;

    #[ORM\ManyToOne(targetEntity: LengthClass::class)]
    #[ORM\JoinColumn(name: "`length_class_id`", referencedColumnName: "`length_class_id`", nullable: true)]
    private ?LengthClass $lengthClass = null;

    #[ORM\Column(name: "`width`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,8)', options: ["default" => 0])]
    private ?float $width = 0.0;

    #[ORM\Column(name: "`height`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,8)', options: ["default" => 0])]
    private ?float $height = 0.0;

    #[ORM\Column(name: "`subtract`", type: Types::BOOLEAN, options: ["default" => 1])]
    private ?bool $subtract = true;

    #[ORM\Column(name: "`minimum`", type: Types::BOOLEAN, options: ["default" => 1])]
    private ?bool $minimum = true;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER, options: ["default" => 0])]
    private ?int $sortOrder = 0;

    #[ORM\Column(name: "`status`", type: Types::INTEGER, options: ["default" => 0])]
    private ?bool $status = false;

    #[ORM\Column(name: "`viewed`", type: Types::INTEGER, options: ["default" => 0])]
    private ?int $viewed = 0;

    #[ORM\Column(name: "`date_added`", type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $dateAdded = null;

    #[ORM\Column(name: "`date_modified`", type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $dateModified = null;

    #[ORM\Column(name: "`back_id`", type: Types::INTEGER, nullable: true)]
    private ?int $backId = null;

    #[ORM\OneToOne(
        mappedBy: "product",
        cascade: ["persist", "remove"],
        targetEntity: ProductDiscontinued::class
    )]
    private ?ProductDiscontinued $productDiscontinued = null;

    /** @var Collection<int, File> */
    #[ORM\ManyToMany(targetEntity: File::class, fetch: "EXTRA_LAZY")]
    #[ORM\JoinTable(name: "oc_product_to_download")]
    #[ORM\JoinColumn(name: "product_id", referencedColumnName: "`product_id`")]
    #[ORM\InverseJoinColumn(name: "download_id", referencedColumnName: "`download_id`")]
    private Collection $files;

    /** @var Collection<int, Shop> */
    #[ORM\ManyToMany(targetEntity: Shop::class, fetch: "EXTRA_LAZY")]
    #[ORM\JoinTable(name: "oc_product_to_store")]
    #[ORM\JoinColumn(name: "product_id", referencedColumnName: "`product_id`")]
    #[ORM\InverseJoinColumn(name: "store_id", referencedColumnName: "`store_id`")]
    private Collection $shops;

    /** @var Collection<int, Review> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "product",
        targetEntity: Review::class,
        cascade: ["persist", "remove"]
    )]
    private Collection $reviews;

    /** @var Collection<int, Filter> */
    #[ORM\ManyToMany(targetEntity: Filter::class, fetch: "EXTRA_LAZY")]
    #[ORM\JoinTable(name: "oc_product_filter")]
    #[ORM\JoinColumn(name: "product_id", referencedColumnName: "`product_id`")]
    #[ORM\InverseJoinColumn(name: "filter_id", referencedColumnName: "`filter_id`")]
    private Collection $filters;

    /** @var Collection<int, ProductDescription> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "product",
        cascade: ["persist", "remove"],
        targetEntity: ProductDescription::class
    )]
    private Collection $descriptions;

    /** @var Collection<int, ProductFaq> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "product",
        cascade: ["persist", "remove"],
        targetEntity: ProductFaq::class
    )]
    private Collection $productFaqs;

    /** @var Collection<int, ProductPrice> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "product",
        cascade: ["persist", "remove"],
        targetEntity: ProductPrice::class
    )]
    private Collection $productPrices;

    /** @var Collection<int, ProductImage> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "product",
        cascade: ["persist", "remove"],
        targetEntity: ProductImage::class
    )]
    private Collection $productImages;

    /** @var Collection<int, ProductOption> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "product",
        cascade: ["persist", "remove"],
        targetEntity: ProductOption::class
    )]
    private Collection $productOptions;

    /** @var Collection<int, ProductToLayout> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "product",
        cascade: ["persist", "remove"],
        targetEntity: ProductToLayout::class
    )]
    private Collection $productToLayouts;

    /** @var Collection<int, ProductAttribute> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "product",
        cascade: ["persist", "remove"],
        targetEntity: ProductAttribute::class
    )]
    private Collection $productAttributes;

    /** @var Collection<int, ProductToCategory> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "product",
        cascade: ["persist", "remove"],
        targetEntity: ProductToCategory::class
    )]
    private Collection $productToCategories;

    public function __construct()
    {
        $this->files = new ArrayCollection();
        $this->shops = new ArrayCollection();
        $this->filters = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->productFaqs = new ArrayCollection();
        $this->descriptions = new ArrayCollection();
        $this->productPrices = new ArrayCollection();
        $this->productImages = new ArrayCollection();
        $this->productOptions = new ArrayCollection();
        $this->productToLayouts = new ArrayCollection();
        $this->productAttributes = new ArrayCollection();
        $this->productToCategories = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Product
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string|null $model
     * @return Product
     */
    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string|null $sku
     * @return Product
     */
    public function setSku(?string $sku): self
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpc(): ?string
    {
        return $this->upc;
    }

    /**
     * @param string|null $upc
     * @return Product
     */
    public function setUpc(?string $upc): self
    {
        $this->upc = $upc;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEan(): ?string
    {
        return $this->ean;
    }

    /**
     * @param string|null $ean
     * @return Product
     */
    public function setEan(?string $ean): self
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getJan(): ?string
    {
        return $this->jan;
    }

    /**
     * @param string|null $jan
     * @return Product
     */
    public function setJan(?string $jan): self
    {
        $this->jan = $jan;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    /**
     * @param string|null $isbn
     * @return Product
     */
    public function setIsbn(?string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMpn(): ?string
    {
        return $this->mpn;
    }

    /**
     * @param string|null $mpn
     * @return Product
     */
    public function setMpn(?string $mpn): self
    {
        $this->mpn = $mpn;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param string|null $location
     * @return Product
     */
    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     * @return Product
     */
    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return StockStatus|null
     */
    public function getStockStatus(): ?StockStatus
    {
        return $this->stockStatus;
    }

    /**
     * @param StockStatus|null $stockStatus
     * @return Product
     */
    public function setStockStatus(?StockStatus $stockStatus): self
    {
        $this->stockStatus = $stockStatus;

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
     * @return Product
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;

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
     * @return Product
     */
    public function setManufacturer(?Manufacturer $manufacturer): self
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShipping(): ?bool
    {
        return $this->shipping;
    }

    /**
     * @param bool|null $shipping
     * @return Product
     */
    public function setShipping(?bool $shipping): self
    {
        $this->shipping = $shipping;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return Product
     */
    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPoints(): ?int
    {
        return $this->points;
    }

    /**
     * @param int|null $points
     * @return Product
     */
    public function setPoints(?int $points): self
    {
        $this->points = $points;

        return $this;
    }

    /**
     * @return TaxClass|null
     */
    public function getTaxClass(): ?TaxClass
    {
        return $this->taxClass;
    }

    /**
     * @param TaxClass|null $taxClass
     * @return Product
     */
    public function setTaxClass(?TaxClass $taxClass): self
    {
        $this->taxClass = $taxClass;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDateAvailable(): ?DateTimeImmutable
    {
        return $this->dateAvailable;
    }

    /**
     * @param DateTimeImmutable|null $dateAvailable
     * @return Product
     */
    public function setDateAvailable(?DateTimeImmutable $dateAvailable): self
    {
        $this->dateAvailable = $dateAvailable;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * @param float|null $weight
     * @return Product
     */
    public function setWeight(?float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return WeightClass|null
     */
    public function getWeightClass(): ?WeightClass
    {
        return $this->weightClass;
    }

    /**
     * @param WeightClass|null $weightClass
     * @return Product
     */
    public function setWeightClass(?WeightClass $weightClass): self
    {
        $this->weightClass = $weightClass;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getLength(): ?float
    {
        return $this->length;
    }

    /**
     * @param float|null $length
     * @return Product
     */
    public function setLength(?float $length): self
    {
        $this->length = $length;

        return $this;
    }

    /**
     * @return LengthClass|null
     */
    public function getLengthClass(): ?LengthClass
    {
        return $this->lengthClass;
    }

    /**
     * @param LengthClass|null $lengthClass
     * @return Product
     */
    public function setLengthClass(?LengthClass $lengthClass): self
    {
        $this->lengthClass = $lengthClass;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getWidth(): ?float
    {
        return $this->width;
    }

    /**
     * @param float|null $width
     * @return Product
     */
    public function setWidth(?float $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getHeight(): ?float
    {
        return $this->height;
    }

    /**
     * @param float|null $height
     * @return Product
     */
    public function setHeight(?float $height): self
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSubtract(): ?bool
    {
        return $this->subtract;
    }

    /**
     * @param bool|null $subtract
     * @return Product
     */
    public function setSubtract(?bool $subtract): self
    {
        $this->subtract = $subtract;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getMinimum(): ?bool
    {
        return $this->minimum;
    }

    /**
     * @param bool|null $minimum
     * @return Product
     */
    public function setMinimum(?bool $minimum): self
    {
        $this->minimum = $minimum;

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
     * @return Product
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * @param bool|null $status
     * @return Product
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getViewed(): ?int
    {
        return $this->viewed;
    }

    /**
     * @param int|null $viewed
     * @return Product
     */
    public function setViewed(?int $viewed): self
    {
        $this->viewed = $viewed;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDateAdded(): ?DateTimeImmutable
    {
        return $this->dateAdded;
    }

    /**
     * @param DateTimeImmutable|null $dateAdded
     * @return Product
     */
    public function setDateAdded(?DateTimeImmutable $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDateModified(): ?DateTimeImmutable
    {
        return $this->dateModified;
    }

    /**
     * @param DateTimeImmutable|null $dateModified
     * @return Product
     */
    public function setDateModified(?DateTimeImmutable $dateModified): self
    {
        $this->dateModified = $dateModified;

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
     * @return Product
     */
    public function setBackId(?int $backId): self
    {
        $this->backId = $backId;

        return $this;
    }

    /**
     * @return ProductDiscontinued|null
     */
    public function getProductDiscontinued(): ?ProductDiscontinued
    {
        return $this->productDiscontinued;
    }

    /**
     * @param ProductDiscontinued|null $productDiscontinued
     * @return Product
     */
    public function setProductDiscontinued(?ProductDiscontinued $productDiscontinued): self
    {
        $this->productDiscontinued = $productDiscontinued;

        return $this;
    }

    /**
     * @return Collection<int, File>
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    /**
     * @return Collection<int, Shop>
     */
    public function getShops(): Collection
    {
        return $this->shops;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    /**
     * @return Collection<int, ProductFaq>
     */
    public function getProductFaqs(): Collection
    {
        return $this->productFaqs;
    }

    /**
     * @return Collection<int, Filter>
     */
    public function getFilters(): Collection
    {
        return $this->filters;
    }

    /**
     * @return Collection<int, ProductDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }

    /**
     * @return Collection<int, ProductPrice>
     */
    public function getProductPrices(): Collection
    {
        return $this->productPrices;
    }

    /**
     * @return Collection<int, ProductImage>
     */
    public function getProductImages(): Collection
    {
        return $this->productImages;
    }

    /**
     * @return Collection<int, ProductOption>
     */
    public function getProductOptions(): Collection
    {
        return $this->productOptions;
    }

    /**
     * @return Collection<int, ProductToLayout>
     */
    public function getProductToLayouts(): Collection
    {
        return $this->productToLayouts;
    }

    /**
     * @return Collection<int, ProductAttribute>
     */
    public function getProductAttributes(): Collection
    {
        return $this->productAttributes;
    }

    /**
     * @return Collection<int, ProductCategory>
     */
    public function getProductToCategories(): Collection
    {
        return $this->productToCategories;
    }

    #[ORM\PreUpdate]
    #[ORM\PrePersist]
    public function updatedTimestamps(): void
    {
        $this->setDateModified(new DateTimeImmutable());

        if (null === $this->getDateAdded()) {
            $this->setDateAdded(new DateTimeImmutable());
        }
    }
}