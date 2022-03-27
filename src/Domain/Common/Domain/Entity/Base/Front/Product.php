<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductRepository;
use App\Domain\Common\Domain\Entity\Base\Front\ProductCategory as ProductToCategory;

/**
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ORM\Table(name="`oc_product`", indexes={@ORM\Index(name="back_id_idx", columns={"back_id"})})
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`product_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", name="`model`", length=64)
     */
    private ?string $model = null;

    /**
     * @ORM\Column(type="string", name="`sku`", length=64)
     */
    private ?string $sku = null;

    /**
     * @ORM\Column(type="string", name="`upc`", length=12)
     */
    private ?string $upc = null;

    /**
     * @ORM\Column(type="string", name="`ean`", length=14)
     */
    private ?string $ean = null;

    /**
     * @ORM\Column(type="string", name="`jan`", length=13)
     */
    private ?string $jan = null;

    /**
     * @ORM\Column(type="string", name="`isbn`", length=17)
     */
    private ?string $isbn = null;

    /**
     * @ORM\Column(type="string", name="`mpn`", length=64)
     */
    private ?string $mpn = null;

    /**
     * @ORM\Column(type="string", name="`location`", length=128)
     */
    private ?string $location = null;

    /**
     * @ORM\Column(type="integer", name="`quantity`", options={"default": 0})
     */
    private ?int $quantity = 0;

    /**
     * @ORM\ManyToOne(targetEntity=StockStatus::class)
     * @ORM\JoinColumn(name="`stock_status_id`", referencedColumnName="`stock_status_id`")
     */
    private ?StockStatus $stockStatus = null;

    /**
     * @ORM\Column(type="string", name="`image`", length=255, nullable=true)
     */
    private ?string $image = null;

    /**
     * @ORM\ManyToOne(targetEntity=Manufacturer::class)
     * @ORM\JoinColumn(name="`manufacturer_id`", referencedColumnName="`manufacturer_id`")
     */
    private ?Manufacturer $manufacturer = null;

    /**
     * @ORM\Column(type="boolean", name="`shipping`", options={"default": 1})
     */
    private ?bool $shipping = true;

    /**
     * @ORM\Column(type="float", name="`price`", options={"default": 0})
     */
    private ?float $price = 0.0;

    /**
     * @ORM\Column(type="integer", name="`points`", options={"default": 0})
     */
    private ?int $points = 0;

    /**
     * @ORM\ManyToOne(targetEntity=TaxClass::class)
     * @ORM\JoinColumn(name="`tax_class_id`", referencedColumnName="`tax_class_id`")
     */
    private ?TaxClass $taxClass = null;

    /**
     * @ORM\Column(type="date_immutable", name="`date_available`", options={"default": "0000-00-00"})
     */
    private ?DateTimeImmutable $dateAvailable = null;

    /**
     * @var float|null $weight
     * @ORM\Column(type="float", name="`weight`", options={"default": 0})
     */
    private ?float $weight = 0.0;

    /**
     * @ORM\ManyToOne(targetEntity=WeightClass::class)
     * @ORM\JoinColumn(name="`weight_class_id`", referencedColumnName="`weight_class_id`")
     */
    private ?WeightClass $weightClass = null;

    /**
     * @var float|null $length
     * @ORM\Column(type="float", name="`length`", options={"default": 0})
     */
    private ?float $length = 0.0;

    /**
     * @ORM\ManyToOne(targetEntity=LengthClass::class)
     * @ORM\JoinColumn(name="`length_class_id`", referencedColumnName="`length_class_id`")
     */
    private ?LengthClass $lengthClass = null;

    /**
     * @ORM\Column(type="float", name="`width`", options={"default": 0})
     */
    private ?float $width = 0.0;

    /**
     * @ORM\Column(type="float", name="`height`", options={"default": 0})
     */
    private ?float $height = 0.0;

    /**
     * @ORM\Column(type="boolean", name="`subtract`", options={"default": 1})
     */
    private ?bool $subtract = true;

    /**
     * @ORM\Column(type="boolean", name="`minimum`", options={"default": 1})
     */
    private ?bool $minimum = true;

    /**
     * @ORM\Column(type="integer", name="`sort_order`", options={"default": 0})
     */
    private ?int $sortOrder = 0;

    /**
     * @ORM\Column(type="boolean", name="`status`", options={"default": 0})
     */
    private ?bool $status = false;

    /**
     * @var int|null $viewed
     * @ORM\Column(type="integer", name="`viewed`", options={"default": 0})
     */
    private ?int $viewed = 0;

    /**
     * @ORM\Column(type="datetime_immutable", name="`date_added`")
     */
    private ?DateTimeImmutable $dateAdded = null;

    /**
     * @ORM\Column(type="datetime_immutable", name="`date_modified`")
     */
    private ?DateTimeImmutable $dateModified = null;

    /**
     * @var Collection|File[]
     * @ORM\ManyToMany(targetEntity=File::class, fetch="EXTRA_LAZY")
     * @ORM\JoinTable(
     *     name="`oc_product_to_download`",
     *     joinColumns={@ORM\JoinColumn(name="`product_id`", referencedColumnName="`product_id`")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="`download_if`", referencedColumnName="`download_if`")}
     * )
     *
     * @psalm-var Collection<int, File>
     */
    private Collection $files;

    /**
     * @var Collection|Shop[]
     * @ORM\ManyToMany(targetEntity=Shop::class, fetch="EXTRA_LAZY")
     * @ORM\JoinTable(
     *     name="`oc_product_to_store`",
     *     joinColumns={@ORM\JoinColumn(name="`product_id`", referencedColumnName="`product_id`")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="`store_id`", referencedColumnName="`store_id`")}
     * )
     *
     * @psalm-var Collection<int, Shop>
     */
    private Collection $shops;

    /**
     * @var Collection|Review[]
     * @ORM\OneToMany(
     *     fetch="EXTRA_LAZY",
     *     mappedBy="product",
     *     orphanRemoval=true,
     *     targetEntity=Review::class,
     *     cascade={"persist", "remove"}
     * )
     *
     * @psalm-var Collection<int, Review>
     */
    private Collection $reviews;

    /**
     * @var Collection|Filter[]
     * @ORM\ManyToMany(targetEntity=Filter::class, fetch="EXTRA_LAZY")
     * @ORM\JoinTable(
     *     name="`oc_product_filter`",
     *     joinColumns={@ORM\JoinColumn(name="`product_id`", referencedColumnName="`product_id`")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="`filter_id`", referencedColumnName="`filter_id`")}
     * )
     *
     * @psalm-var Collection<int, Filter>
     */
    private Collection $filters;

    /**
     * @var Collection|ProductDescription[]
     * @ORM\OneToMany(
     *     fetch="EXTRA_LAZY",
     *     mappedBy="product",
     *     orphanRemoval=true,
     *     cascade={"persist", "remove"},
     *     targetEntity=ProductDescription::class
     * )
     *
     * @psalm-var Collection<int, ProductDescription>
     */
    private Collection $descriptions;

    /**
     * @var Collection|ProductImage[]
     * @ORM\OneToMany(
     *     fetch="EXTRA_LAZY",
     *     mappedBy="product",
     *     orphanRemoval=true,
     *     cascade={"persist", "remove"},
     *     targetEntity=ProductImage::class
     * )
     *
     * @psalm-var Collection<int, ProductImage>
     */
    private Collection $productImages;

    /**
     * @var Collection|ProductOption[]
     * @ORM\OneToMany(
     *     fetch="EXTRA_LAZY",
     *     mappedBy="product",
     *     orphanRemoval=true,
     *     cascade={"persist", "remove"},
     *     targetEntity=ProductOption::class
     * )
     *
     * @psalm-var Collection<int, ProductOption>
     */
    private Collection $productOptions;

    /**
     * @var Collection|ProductToLayout[]
     * @ORM\OneToMany(
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true,
     *     mappedBy="product",
     *     cascade={"persist", "remove"},
     *     targetEntity=ProductToLayout::class
     * )
     *
     * @psalm-var Collection<int, ProductToLayout>
     */
    private Collection $productToLayouts;

    /**
     * @var Collection|ProductAttribute[]
     * @ORM\OneToMany(
     *     fetch="EXTRA_LAZY",
     *     mappedBy="product",
     *     orphanRemoval=true,
     *     cascade={"persist", "remove"},
     *     targetEntity=ProductAttribute::class
     * )
     *
     * @psalm-var Collection<int, ProductAttribute>
     */
    private Collection $productAttributes;

    /**
     * @var Collection|ProductToCategory[]
     * @ORM\OneToMany(
     *     mappedBy="product",
     *     orphanRemoval=true,
     *     fetch="EXTRA_LAZY",
     *     cascade={"persist", "remove"},
     *     targetEntity=ProductToCategory::class
     * )
     *
     * @psalm-var Collection<int, ProductToCategory>
     */
    private Collection $productToCategories;

    public function __construct()
    {
        $this->files = new ArrayCollection();
        $this->shops = new ArrayCollection();
        $this->filters = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->descriptions = new ArrayCollection();
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
     * @return File[]|Collection
     *
     * @psalm-return Collection<int, File>
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    /**
     * @return Shop[]|Collection
     *
     * @psalm-return Collection<int, Shop>
     */
    public function getShops(): Collection
    {
        return $this->shops;
    }

    /**
     * @return Review[]|Collection
     *
     * @psalm-return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    /**
     * @return Filter[]|Collection
     *
     * @psalm-return Collection<int, Filter>
     */
    public function getFilters(): Collection
    {
        return $this->filters;
    }

    /**
     * @return ProductDescription[]|Collection
     *
     * @psalm-return Collection<int, ProductDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }

    /**
     * @return ProductImage[]|Collection
     *
     * @psalm-return Collection<int, ProductImage>
     */
    public function getProductImages(): Collection
    {
        return $this->productImages;
    }

    /**
     * @return ProductOption[]|Collection
     *
     * @psalm-return Collection<int, ProductOption>
     */
    public function getProductOptions(): Collection
    {
        return $this->productOptions;
    }

    /**
     * @return ProductToLayout[]|Collection
     *
     * @psalm-return Collection<int, ProductToLayout>
     */
    public function getProductToLayouts(): Collection
    {
        return $this->productToLayouts;
    }

    /**
     * @return ProductAttribute[]|Collection
     *
     * @psalm-return Collection<int, ProductAttribute>
     */
    public function getProductAttributes(): Collection
    {
        return $this->productAttributes;
    }

    /**
     * @return ProductCategory[]|Collection
     *
     * @psalm-return Collection<int, ProductCategory>
     */
    public function getProductToCategories(): Collection
    {
        return $this->productToCategories;
    }

    /**
     * @ORM\PreUpdate
     * @ORM\PrePersist
     */
    public function updatedTimestamps(): void
    {
        $this->setDateModified(new DateTimeImmutable());

        if (null === $this->getDateAdded()) {
            $this->setDateAdded(new DateTimeImmutable());
        }
    }
}