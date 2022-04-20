<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OrderRepository;

#[ORM\Table(name: "`oc_order`")]
#[ORM\Index(name: "back_id_idx", columns: ["back_id"])]
#[ORM\Entity(repositoryClass: OrderRepository::class)]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`order_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: "`invoice_no`", type: Types::INTEGER, options: ["default" => 0])]
    private ?int $invoiceNo = 0;

    #[ORM\Column(name: "`invoice_prefix`", type: Types::STRING, length: 26)]
    private ?string $invoicePrefix = null;

    #[ORM\ManyToOne(targetEntity: Shop::class)]
    #[ORM\JoinColumn(name: "`store_id`", referencedColumnName: "`store_id`", nullable: true)]
    private ?Shop $shop = null;

    #[ORM\Column(name: "`store_name`", type: Types::STRING, length: 64)]
    private ?string $shopName = null;

    #[ORM\Column(name: "`store_url`", type: Types::STRING, length: 255)]
    private ?string $shopUrl = null;

    #[ORM\ManyToOne(targetEntity: Customer::class)]
    #[ORM\JoinColumn(name: "`customer_id`", referencedColumnName: "`customer_id`", nullable: true)]
    private ?Customer $customer = null;

    #[ORM\ManyToOne(targetEntity: CustomerGroup::class)]
    #[ORM\JoinColumn(name: "`customer_group_id`", referencedColumnName: "`customer_group_id`", nullable: true)]
    private ?CustomerGroup $customerGroup = null;

    #[ORM\Column(name: "`firstname`", type: Types::STRING, length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(name: "`lastname`", type: Types::STRING, length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(name: "`email`", type: Types::STRING, length: 255)]
    private ?string $email = null;

    #[ORM\Column(name: "`telephone`", type: Types::STRING, length: 32)]
    private ?string $phone = null;

    #[ORM\Column(name: "`fax`", type: Types::STRING, length: 32)]
    private ?string $fax = null;

    #[ORM\Column(name: "`custom_field`", type: Types::TEXT)]
    private ?string $customField = null;

    #[ORM\Column(name: "`payment_firstname`", type: Types::STRING, length: 255)]
    private ?string $paymentFirstName = null;

    #[ORM\Column(name: "`payment_lastname`", type: Types::STRING, length: 255)]
    private ?string $paymentLastName = null;

    #[ORM\Column(name: "`payment_company`", type: Types::STRING, length: 60)]
    private ?string $paymentCompany = null;

    #[ORM\Column(name: "`payment_address_1`", type: Types::STRING, length: 255)]
    private ?string $paymentAddress1 = null;

    #[ORM\Column(name: "`payment_address_2`", type: Types::STRING, length: 255)]
    private ?string $paymentAddress2 = null;

    #[ORM\Column(name: "`payment_city`", type: Types::STRING, length: 255)]
    private ?string $paymentCity = null;

    #[ORM\Column(name: "`payment_postcode`", type: Types::STRING, length: 10)]
    private ?string $paymentPostCode = null;

    #[ORM\Column(name: "`payment_country`", type: Types::STRING, length: 128)]
    private ?string $paymentCountryName = null;

    #[ORM\ManyToOne(targetEntity: Country::class)]
    #[ORM\JoinColumn(name: "`payment_country_id`", referencedColumnName: "`country_id`", nullable: true)]
    private ?Country $paymentCountry = null;

    #[ORM\Column(name: "`payment_zone`", type: Types::STRING, length: 255)]
    private ?string $paymentZoneName = null;

    #[ORM\ManyToOne(targetEntity: Zone::class)]
    #[ORM\JoinColumn(name: "`payment_zone_id`", referencedColumnName: "`zone_id`", nullable: true)]
    private ?Zone $paymentZone = null;

    #[ORM\Column(name: "`payment_address_format`", type: Types::TEXT)]
    private ?string $paymentAddressFormat = null;

    #[ORM\Column(name: "`payment_custom_field`", type: Types::TEXT)]
    private ?string $paymentCustomField = null;

    #[ORM\Column(name: "`payment_method`", type: Types::STRING, length: 128)]
    private ?string $paymentMethodName = null;

    #[ORM\Column(name: "`payment_code`", type: Types::STRING, length: 128)]
    private ?string $paymentCode = null;

    #[ORM\Column(name: "`shipping_firstname`", type: Types::STRING, length: 255)]
    private ?string $shippingFirstName = null;

    #[ORM\Column(name: "`shipping_lastname`", type: Types::STRING, length: 255)]
    private ?string $shippingLastName = null;

    #[ORM\Column(name: "`shipping_company`", type: Types::STRING, length: 40)]
    private ?string $shippingCompany = null;

    #[ORM\Column(name: "`shipping_address_1`", type: Types::STRING, length: 255)]
    private ?string $shippingAddress1 = null;

    #[ORM\Column(name: "`shipping_address_2`", type: Types::STRING, length: 255)]
    private ?string $shippingAddress2 = null;

    #[ORM\Column(name: "`shipping_city`", type: Types::STRING, length: 255)]
    private ?string $shippingCity = null;

    #[ORM\Column(name: "`shipping_postcode`", type: Types::STRING, length: 10)]
    private ?string $shippingPostCode = null;

    #[ORM\Column(name: "`shipping_country`", type: Types::STRING, length: 128)]
    private ?string $shippingCountryName = null;

    #[ORM\ManyToOne(targetEntity: Country::class)]
    #[ORM\JoinColumn(name: "`shipping_country_id`", referencedColumnName: "`country_id`", nullable: true)]
    private ?Country $shippingCountry = null;

    #[ORM\Column(name: "`shipping_zone`", type: Types::STRING, length: 255)]
    private ?string $shippingZoneName = null;

    #[ORM\ManyToOne(targetEntity: Zone::class)]
    #[ORM\JoinColumn(name: "`shipping_zone_id`", referencedColumnName: "`zone_id`", nullable: true)]
    private ?Zone $shippingZone = null;

    #[ORM\Column(name: "`shipping_address_format`", type: Types::STRING, length: 255)]
    private ?string $shippingAddressFormat = null;

    #[ORM\Column(name: "`shipping_custom_field`", type: Types::STRING, length: 255)]
    private ?string $shippingCustomField = null;

    #[ORM\Column(name: "`shipping_method`", type: Types::STRING, length: 128)]
    private ?string $shippingMethodName = null;

    #[ORM\Column(name: "`shipping_code`", type: Types::STRING, length: 128)]
    private ?string $shippingCode = null;

    #[ORM\Column(name: "`comment`", type: Types::TEXT)]
    private ?string $comment = null;

    #[ORM\Column(name: "`total`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,4)', options: ["default" => 0])]
    private ?float $total = 0.0;

    #[ORM\ManyToOne(targetEntity: OrderStatus::class)]
    #[ORM\JoinColumn(name: "`order_status_id`", referencedColumnName: "`order_status_id`", nullable: true)]
    private ?OrderStatus $orderStatus = null;

    #[ORM\Column(name: "`affiliate_id`", type: Types::INTEGER, nullable: true)]
    private ?int $affiliateId = null;

    #[ORM\Column(name: "`commission`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,4)')]
    private ?float $commission = null;

    #[ORM\ManyToOne(targetEntity: Marketing::class)]
    #[ORM\JoinColumn(name: "`marketing_id`", referencedColumnName: "`marketing_id`", nullable: true)]
    private ?Marketing $marketing = null;

    #[ORM\Column(name: "`tracking`", type: Types::STRING, length: 64)]
    private ?string $tracking = null;

    #[ORM\ManyToOne(targetEntity: Language::class)]
    #[ORM\JoinColumn(name: "`language_id`", referencedColumnName: "`language_id`", nullable: true)]
    private ?Language $language = null;

    #[ORM\ManyToOne(targetEntity: Currency::class)]
    #[ORM\JoinColumn(name: "`currency_id`", referencedColumnName: "`currency_id`", nullable: true)]
    private ?Currency $currency = null;

    #[ORM\Column(name: "`currency_code`", type: Types::STRING, length: 3)]
    private ?string $currencyCode = null;

    #[ORM\Column(name: "`currency_value`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,8)', options: ["default" => 1])]
    private ?float $currencyValue = 1.0;

    #[ORM\Column(name: "`ip`", type: Types::STRING, length: 40)]
    private ?string $ip = null;

    #[ORM\Column(name: "`forwarded_ip`", type: Types::STRING, length: 255)]
    private ?string $forwardedIp = null;

    #[ORM\Column(name: "`user_agent`", type: Types::STRING, length: 255)]
    private ?string $userAgent = null;

    #[ORM\Column(name: "`accept_language`", type: Types::STRING, length: 255)]
    private ?string $acceptLanguage = null;

    #[ORM\Column(name: "`date_added`", type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $dateAdded = null;

    #[ORM\Column(name: "`date_modified`", type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $dateModified = null;

    #[ORM\Column(name: "`back_id`", type: Types::INTEGER, nullable: true)]
    private ?int $backId = null;

    /** @var Collection<int, OrderTotal> */
    #[ORM\OneToMany(
        mappedBy: "order",
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        cascade: ["persist", "remove"],
        targetEntity: OrderTotal::class
    )]
    private Collection $orderTotals;

    /** @var Collection<int, OrderHistory> */
    #[ORM\OneToMany(
        mappedBy: "order",
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        cascade: ["persist", "remove"],
        targetEntity: OrderHistory::class
    )]
    private Collection $orderHistory;

    /** @var Collection<int, OrderProduct> */
    #[ORM\OneToMany(
        mappedBy: "order",
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        cascade: ["persist", "remove"],
        targetEntity: OrderProduct::class
    )]
    private Collection $orderProducts;

    /** @var Collection<int, OrderVoucher> */
    #[ORM\OneToMany(
        mappedBy: "order",
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        cascade: ["persist", "remove"],
        targetEntity: OrderVoucher::class
    )]
    private Collection $orderVouchers;

    /** @var Collection<int, OrderShipment> */
    #[ORM\OneToMany(
        mappedBy: "order",
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        cascade: ["persist", "remove"],
        targetEntity: OrderShipment::class
    )]
    private Collection $orderShipments;

    /** @var Collection<int, OrderRecurring> */
    #[ORM\OneToMany(
        mappedBy: "order",
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        cascade: ["persist", "remove"],
        targetEntity: OrderRecurring::class
    )]
    private Collection $orderRecurrings;

    /** @var Collection<int, OrderCustomField> */
    #[ORM\OneToMany(
        mappedBy: "order",
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        cascade: ["persist", "remove"],
        targetEntity: OrderCustomField::class
    )]
    private Collection $orderCustomFields;

    /** @var Collection<int, OrderSimpleFields> */
    #[ORM\OneToMany(
        mappedBy: "order",
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        cascade: ["persist", "remove"],
        targetEntity: OrderSimpleFields::class
    )]
    private Collection $orderSimpleFields;

    public function __construct()
    {
        $this->orderTotals = new ArrayCollection();
        $this->orderHistory = new ArrayCollection();
        $this->orderProducts = new ArrayCollection();
        $this->orderVouchers = new ArrayCollection();
        $this->orderShipments = new ArrayCollection();
        $this->orderRecurrings = new ArrayCollection();
        $this->orderCustomFields = new ArrayCollection();
        $this->orderSimpleFields = new ArrayCollection();
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
     * @return Order
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getInvoiceNo(): ?int
    {
        return $this->invoiceNo;
    }

    /**
     * @param int|null $invoiceNo
     * @return Order
     */
    public function setInvoiceNo(?int $invoiceNo): self
    {
        $this->invoiceNo = $invoiceNo;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInvoicePrefix(): ?string
    {
        return $this->invoicePrefix;
    }

    /**
     * @param string|null $invoicePrefix
     * @return Order
     */
    public function setInvoicePrefix(?string $invoicePrefix): self
    {
        $this->invoicePrefix = $invoicePrefix;

        return $this;
    }

    /**
     * @return Shop|null
     */
    public function getShop(): ?Shop
    {
        return $this->shop;
    }

    /**
     * @param Shop|null $shop
     * @return Order
     */
    public function setShop(?Shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShopName(): ?string
    {
        return $this->shopName;
    }

    /**
     * @param string|null $shopName
     * @return Order
     */
    public function setShopName(?string $shopName): self
    {
        $this->shopName = $shopName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShopUrl(): ?string
    {
        return $this->shopUrl;
    }

    /**
     * @param string|null $shopUrl
     * @return Order
     */
    public function setShopUrl(?string $shopUrl): self
    {
        $this->shopUrl = $shopUrl;

        return $this;
    }

    /**
     * @return Customer|null
     */
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer|null $customer
     * @return Order
     */
    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return CustomerGroup|null
     */
    public function getCustomerGroup(): ?CustomerGroup
    {
        return $this->customerGroup;
    }

    /**
     * @param CustomerGroup|null $customerGroup
     * @return Order
     */
    public function setCustomerGroup(?CustomerGroup $customerGroup): self
    {
        $this->customerGroup = $customerGroup;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     * @return Order
     */
    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     * @return Order
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Order
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return Order
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * @param string|null $fax
     * @return Order
     */
    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomField(): ?string
    {
        return $this->customField;
    }

    /**
     * @param string|null $customField
     * @return Order
     */
    public function setCustomField(?string $customField): self
    {
        $this->customField = $customField;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentFirstName(): ?string
    {
        return $this->paymentFirstName;
    }

    /**
     * @param string|null $paymentFirstName
     * @return Order
     */
    public function setPaymentFirstName(?string $paymentFirstName): self
    {
        $this->paymentFirstName = $paymentFirstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentLastName(): ?string
    {
        return $this->paymentLastName;
    }

    /**
     * @param string|null $paymentLastName
     * @return Order
     */
    public function setPaymentLastName(?string $paymentLastName): self
    {
        $this->paymentLastName = $paymentLastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentCompany(): ?string
    {
        return $this->paymentCompany;
    }

    /**
     * @param string|null $paymentCompany
     * @return Order
     */
    public function setPaymentCompany(?string $paymentCompany): self
    {
        $this->paymentCompany = $paymentCompany;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentAddress1(): ?string
    {
        return $this->paymentAddress1;
    }

    /**
     * @param string|null $paymentAddress1
     * @return Order
     */
    public function setPaymentAddress1(?string $paymentAddress1): self
    {
        $this->paymentAddress1 = $paymentAddress1;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentAddress2(): ?string
    {
        return $this->paymentAddress2;
    }

    /**
     * @param string|null $paymentAddress2
     * @return Order
     */
    public function setPaymentAddress2(?string $paymentAddress2): self
    {
        $this->paymentAddress2 = $paymentAddress2;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentCity(): ?string
    {
        return $this->paymentCity;
    }

    /**
     * @param string|null $paymentCity
     * @return Order
     */
    public function setPaymentCity(?string $paymentCity): self
    {
        $this->paymentCity = $paymentCity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentPostCode(): ?string
    {
        return $this->paymentPostCode;
    }

    /**
     * @param string|null $paymentPostCode
     * @return Order
     */
    public function setPaymentPostCode(?string $paymentPostCode): self
    {
        $this->paymentPostCode = $paymentPostCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentCountryName(): ?string
    {
        return $this->paymentCountryName;
    }

    /**
     * @param string|null $paymentCountryName
     * @return Order
     */
    public function setPaymentCountryName(?string $paymentCountryName): self
    {
        $this->paymentCountryName = $paymentCountryName;

        return $this;
    }

    /**
     * @return Country|null
     */
    public function getPaymentCountry(): ?Country
    {
        return $this->paymentCountry;
    }

    /**
     * @param Country|null $paymentCountry
     * @return Order
     */
    public function setPaymentCountry(?Country $paymentCountry): self
    {
        $this->paymentCountry = $paymentCountry;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentZoneName(): ?string
    {
        return $this->paymentZoneName;
    }

    /**
     * @param string|null $paymentZoneName
     * @return Order
     */
    public function setPaymentZoneName(?string $paymentZoneName): self
    {
        $this->paymentZoneName = $paymentZoneName;

        return $this;
    }

    /**
     * @return Zone|null
     */
    public function getPaymentZone(): ?Zone
    {
        return $this->paymentZone;
    }

    /**
     * @param Zone|null $paymentZone
     * @return Order
     */
    public function setPaymentZone(?Zone $paymentZone): self
    {
        $this->paymentZone = $paymentZone;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentAddressFormat(): ?string
    {
        return $this->paymentAddressFormat;
    }

    /**
     * @param string|null $paymentAddressFormat
     * @return Order
     */
    public function setPaymentAddressFormat(?string $paymentAddressFormat): self
    {
        $this->paymentAddressFormat = $paymentAddressFormat;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentCustomField(): ?string
    {
        return $this->paymentCustomField;
    }

    /**
     * @param string|null $paymentCustomField
     * @return Order
     */
    public function setPaymentCustomField(?string $paymentCustomField): self
    {
        $this->paymentCustomField = $paymentCustomField;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentMethodName(): ?string
    {
        return $this->paymentMethodName;
    }

    /**
     * @param string|null $paymentMethodName
     * @return Order
     */
    public function setPaymentMethodName(?string $paymentMethodName): self
    {
        $this->paymentMethodName = $paymentMethodName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentCode(): ?string
    {
        return $this->paymentCode;
    }

    /**
     * @param string|null $paymentCode
     * @return Order
     */
    public function setPaymentCode(?string $paymentCode): self
    {
        $this->paymentCode = $paymentCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingFirstName(): ?string
    {
        return $this->shippingFirstName;
    }

    /**
     * @param string|null $shippingFirstName
     * @return Order
     */
    public function setShippingFirstName(?string $shippingFirstName): self
    {
        $this->shippingFirstName = $shippingFirstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingLastName(): ?string
    {
        return $this->shippingLastName;
    }

    /**
     * @param string|null $shippingLastName
     * @return Order
     */
    public function setShippingLastName(?string $shippingLastName): self
    {
        $this->shippingLastName = $shippingLastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingCompany(): ?string
    {
        return $this->shippingCompany;
    }

    /**
     * @param string|null $shippingCompany
     * @return Order
     */
    public function setShippingCompany(?string $shippingCompany): self
    {
        $this->shippingCompany = $shippingCompany;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingAddress1(): ?string
    {
        return $this->shippingAddress1;
    }

    /**
     * @param string|null $shippingAddress1
     * @return Order
     */
    public function setShippingAddress1(?string $shippingAddress1): self
    {
        $this->shippingAddress1 = $shippingAddress1;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingAddress2(): ?string
    {
        return $this->shippingAddress2;
    }

    /**
     * @param string|null $shippingAddress2
     * @return Order
     */
    public function setShippingAddress2(?string $shippingAddress2): self
    {
        $this->shippingAddress2 = $shippingAddress2;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingCity(): ?string
    {
        return $this->shippingCity;
    }

    /**
     * @param string|null $shippingCity
     * @return Order
     */
    public function setShippingCity(?string $shippingCity): self
    {
        $this->shippingCity = $shippingCity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingPostCode(): ?string
    {
        return $this->shippingPostCode;
    }

    /**
     * @param string|null $shippingPostCode
     * @return Order
     */
    public function setShippingPostCode(?string $shippingPostCode): self
    {
        $this->shippingPostCode = $shippingPostCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingCountryName(): ?string
    {
        return $this->shippingCountryName;
    }

    /**
     * @param string|null $shippingCountryName
     * @return Order
     */
    public function setShippingCountryName(?string $shippingCountryName): self
    {
        $this->shippingCountryName = $shippingCountryName;

        return $this;
    }

    /**
     * @return Country|null
     */
    public function getShippingCountry(): ?Country
    {
        return $this->shippingCountry;
    }

    /**
     * @param Country|null $shippingCountry
     * @return Order
     */
    public function setShippingCountry(?Country $shippingCountry): self
    {
        $this->shippingCountry = $shippingCountry;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingZoneName(): ?string
    {
        return $this->shippingZoneName;
    }

    /**
     * @param string|null $shippingZoneName
     * @return Order
     */
    public function setShippingZoneName(?string $shippingZoneName): self
    {
        $this->shippingZoneName = $shippingZoneName;

        return $this;
    }

    /**
     * @return Zone|null
     */
    public function getShippingZone(): ?Zone
    {
        return $this->shippingZone;
    }

    /**
     * @param Zone|null $shippingZone
     * @return Order
     */
    public function setShippingZone(?Zone $shippingZone): self
    {
        $this->shippingZone = $shippingZone;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingAddressFormat(): ?string
    {
        return $this->shippingAddressFormat;
    }

    /**
     * @param string|null $shippingAddressFormat
     * @return Order
     */
    public function setShippingAddressFormat(?string $shippingAddressFormat): self
    {
        $this->shippingAddressFormat = $shippingAddressFormat;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingCustomField(): ?string
    {
        return $this->shippingCustomField;
    }

    /**
     * @param string|null $shippingCustomField
     * @return Order
     */
    public function setShippingCustomField(?string $shippingCustomField): self
    {
        $this->shippingCustomField = $shippingCustomField;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingMethodName(): ?string
    {
        return $this->shippingMethodName;
    }

    /**
     * @param string|null $shippingMethodName
     * @return Order
     */
    public function setShippingMethodName(?string $shippingMethodName): self
    {
        $this->shippingMethodName = $shippingMethodName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingCode(): ?string
    {
        return $this->shippingCode;
    }

    /**
     * @param string|null $shippingCode
     * @return Order
     */
    public function setShippingCode(?string $shippingCode): self
    {
        $this->shippingCode = $shippingCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     * @return Order
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

    /**
     * @param float|null $total
     * @return Order
     */
    public function setTotal(?float $total): self
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return OrderStatus|null
     */
    public function getOrderStatus(): ?OrderStatus
    {
        return $this->orderStatus;
    }

    /**
     * @param OrderStatus|null $orderStatus
     * @return Order
     */
    public function setOrderStatus(?OrderStatus $orderStatus): self
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAffiliateId(): ?int
    {
        return $this->affiliateId;
    }

    /**
     * @param int|null $affiliateId
     * @return Order
     */
    public function setAffiliateId(?int $affiliateId): self
    {
        $this->affiliateId = $affiliateId;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getCommission(): ?float
    {
        return $this->commission;
    }

    /**
     * @param float|null $commission
     * @return Order
     */
    public function setCommission(?float $commission): self
    {
        $this->commission = $commission;

        return $this;
    }

    /**
     * @return Marketing|null
     */
    public function getMarketing(): ?Marketing
    {
        return $this->marketing;
    }

    /**
     * @param Marketing|null $marketing
     * @return Order
     */
    public function setMarketing(?Marketing $marketing): self
    {
        $this->marketing = $marketing;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTracking(): ?string
    {
        return $this->tracking;
    }

    /**
     * @param string|null $tracking
     * @return Order
     */
    public function setTracking(?string $tracking): self
    {
        $this->tracking = $tracking;

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
     * @return Order
     */
    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return Currency|null
     */
    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    /**
     * @param Currency|null $currency
     * @return Order
     */
    public function setCurrency(?Currency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    /**
     * @param string|null $currencyCode
     * @return Order
     */
    public function setCurrencyCode(?string $currencyCode): self
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getCurrencyValue(): ?float
    {
        return $this->currencyValue;
    }

    /**
     * @param float|null $currencyValue
     * @return Order
     */
    public function setCurrencyValue(?float $currencyValue): self
    {
        $this->currencyValue = $currencyValue;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIp(): ?string
    {
        return $this->ip;
    }

    /**
     * @param string|null $ip
     * @return Order
     */
    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getForwardedIp(): ?string
    {
        return $this->forwardedIp;
    }

    /**
     * @param string|null $forwardedIp
     * @return Order
     */
    public function setForwardedIp(?string $forwardedIp): self
    {
        $this->forwardedIp = $forwardedIp;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    /**
     * @param string|null $userAgent
     * @return Order
     */
    public function setUserAgent(?string $userAgent): self
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAcceptLanguage(): ?string
    {
        return $this->acceptLanguage;
    }

    /**
     * @param string|null $acceptLanguage
     * @return Order
     */
    public function setAcceptLanguage(?string $acceptLanguage): self
    {
        $this->acceptLanguage = $acceptLanguage;

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
     * @return Order
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
     * @return Order
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
     * @return Order
     */
    public function setBackId(?int $backId): self
    {
        $this->backId = $backId;

        return $this;
    }

    /**
     * @return Collection<int, OrderTotal>
     */
    public function getOrderTotals(): Collection
    {
        return $this->orderTotals;
    }

    /**
     * @return Collection<int, OrderHistory>
     */
    public function getOrderHistory(): Collection
    {
        return $this->orderHistory;
    }

    /**
     * @return Collection<int, OrderProduct>
     */
    public function getOrderProducts(): Collection
    {
        return $this->orderProducts;
    }

    /**
     * @return Collection<int, OrderVoucher>
     */
    public function getOrderVouchers(): Collection
    {
        return $this->orderVouchers;
    }

    /**
     * @return Collection<int, OrderShipment>
     */
    public function getOrderShipments(): Collection
    {
        return $this->orderShipments;
    }

    /**
     * @return Collection<int, OrderRecurring>
     */
    public function getOrderRecurrings(): Collection
    {
        return $this->orderRecurrings;
    }

    /**
     * @return Collection<int, OrderCustomField>
     */
    public function getOrderCustomFields(): Collection
    {
        return $this->orderCustomFields;
    }

    /**
     * @return Collection<int, OrderSimpleFields>
     */
    public function getOrderSimpleFields(): Collection
    {
        return $this->orderSimpleFields;
    }
}