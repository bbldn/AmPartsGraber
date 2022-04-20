<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CustomerRepository;

#[ORM\HasLifecycleCallbacks]
#[ORM\Table(name: "`oc_customer`")]
#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`customer_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CustomerGroup::class)]
    #[ORM\JoinColumn(name: "`customer_group_id`", referencedColumnName: "`customer_group_id`", nullable: true)]
    private ?CustomerGroup $group = null;

    #[ORM\ManyToOne(targetEntity: Shop::class)]
    #[ORM\JoinColumn(name: "`store_id`", referencedColumnName: "`store_id`", nullable: true)]
    private ?Shop $shop = null;

    #[ORM\ManyToOne(targetEntity: Language::class)]
    #[ORM\JoinColumn(name: "`language_id`", referencedColumnName: "`language_id`", nullable: true)]
    private ?Language $language = null;

    #[ORM\Column(name: "`firstname`", type: Types::STRING, length: 32)]
    private ?string $firstName = null;

    #[ORM\Column(name: "`lastname`", type: Types::STRING, length: 32)]
    private ?string $lastName = null;

    #[ORM\Column(name: "`email`", type: Types::STRING, length: 96)]
    private ?string $email = null;

    #[ORM\Column(name: "`telephone`", type: Types::STRING, length: 32)]
    private ?string $phone = null;

    #[ORM\Column(name: "`fax`", type: Types::STRING, length: 32)]
    private ?string $fax = null;

    #[ORM\Column(name: "`password`", type: Types::STRING, length: 40)]
    private ?string $password = null;

    #[ORM\Column(name: "`salt`", type: Types::STRING, length: 9)]
    private ?string $salt = null;

    #[ORM\Column(name: "`cart`", type: Types::TEXT, nullable: true)]
    private ?string $cart = null;

    #[ORM\Column(name: "`wishlist`", type: Types::TEXT, nullable: true)]
    private ?string $wishList = null;

    #[ORM\Column(name: "`newsletter`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $newsletter = false;

    #[ORM\ManyToOne(targetEntity: Address::class, inversedBy: "customer")]
    #[ORM\JoinColumn(name: "`address_id`", referencedColumnName: "`address_id`", nullable: true)]
    private ?Address $address = null;

    #[ORM\Column(name: "`custom_field`", type: Types::TEXT)]
    private ?string $customField = null;

    #[ORM\Column(name: "`ip`", type: Types::STRING, length: 40)]
    private ?string $ip = null;

    #[ORM\Column(name: "`status`", type: Types::BOOLEAN)]
    private ?bool $status = null;

    #[ORM\Column(name: "`safe`", type: Types::BOOLEAN)]
    private ?bool $safe = null;

    #[ORM\Column(name: "`token`", type: Types::TEXT)]
    private ?string $token = null;

    #[ORM\Column(name: "`code`", type: Types::STRING, length: 40)]
    private ?string $code = null;

    #[ORM\Column(name: "`date_added`", type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $dateAdded = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Customer
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return CustomerGroup|null
     */
    public function getGroup(): ?CustomerGroup
    {
        return $this->group;
    }

    /**
     * @param CustomerGroup|null $group
     * @return Customer
     */
    public function setGroup(?CustomerGroup $group): self
    {
        $this->group = $group;

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
     * @return Customer
     */
    public function setShop(?Shop $shop): self
    {
        $this->shop = $shop;

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
     * @return Customer
     */
    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

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
     * @return Customer
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
     * @return Customer
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
     * @return Customer
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
     * @return Customer
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
     * @return Customer
     */
    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return Customer
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSalt(): ?string
    {
        return $this->salt;
    }

    /**
     * @param string|null $salt
     * @return Customer
     */
    public function setSalt(?string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCart(): ?string
    {
        return $this->cart;
    }

    /**
     * @param string|null $cart
     * @return Customer
     */
    public function setCart(?string $cart): self
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWishList(): ?string
    {
        return $this->wishList;
    }

    /**
     * @param string|null $wishList
     * @return Customer
     */
    public function setWishList(?string $wishList): self
    {
        $this->wishList = $wishList;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNewsletter(): ?bool
    {
        return $this->newsletter;
    }

    /**
     * @param bool|null $newsletter
     * @return Customer
     */
    public function setNewsletter(?bool $newsletter): self
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * @return Address|null
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @param Address|null $address
     * @return Customer
     */
    public function setAddress(?Address $address): self
    {
        $this->address = $address;

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
     * @return Customer
     */
    public function setCustomField(?string $customField): self
    {
        $this->customField = $customField;

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
     * @return Customer
     */
    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

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
     * @return Customer
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSafe(): ?bool
    {
        return $this->safe;
    }

    /**
     * @param bool|null $safe
     * @return Customer
     */
    public function setSafe(?bool $safe): self
    {
        $this->safe = $safe;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string|null $token
     * @return Customer
     */
    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     * @return Customer
     */
    public function setCode(?string $code): self
    {
        $this->code = $code;

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
     * @return Customer
     */
    public function setDateAdded(?DateTimeImmutable $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * @ORM\PreUpdate
     * @ORM\PrePersist
     */
    public function updatedTimestamps(): void
    {
        if (null === $this->getDateAdded()) {
            $this->setDateAdded(new DateTimeImmutable());
        }
    }
}