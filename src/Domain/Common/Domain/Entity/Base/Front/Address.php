<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\AddressRepository;

#[ORM\Table(name: "`oc_address`")]
#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`address_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Customer::class, inversedBy: "address")]
    #[ORM\JoinColumn(name: "`customer_id`", referencedColumnName: "`customer_id`", nullable: true)]
    private ?Customer $customer = null;

    #[ORM\Column(name: "`firstname`", type: Types::STRING, length: 32)]
    private ?string $firstName = null;

    #[ORM\Column(name: "`lastname`", type: Types::STRING, length: 32)]
    private ?string $lastName = null;

    #[ORM\Column(name: "`company`", type: Types::STRING, length: 40)]
    private ?string $company = null;

    #[ORM\Column(name: "`address_1`", type: Types::STRING, length: 128)]
    private ?string $address1 = null;

    #[ORM\Column(name: "`address_2`", type: Types::STRING, length: 128)]
    private ?string $address2 = null;

    #[ORM\Column(name: "`city`", type: Types::STRING, length: 128)]
    private ?string $city = null;

    #[ORM\Column(name: "`postcode`", type: Types::STRING, length: 10)]
    private ?string $postCode = null;

    #[ORM\ManyToOne(targetEntity: Country::class)]
    #[ORM\JoinColumn(name: "`country_id`", referencedColumnName: "`country_id`", nullable: true)]
    private ?Country $country = null;

    #[ORM\ManyToOne(targetEntity: Zone::class)]
    #[ORM\JoinColumn(name: "`zone_id`", referencedColumnName: "`zone_id`", nullable: true)]
    private ?Zone $zone = null;

    #[ORM\Column(name: "`custom_field`", type: Types::TEXT)]
    private ?string $customField = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Address
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

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
     * @return Address
     */
    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

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
     * @return Address
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
     * @return Address
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param string|null $company
     * @return Address
     */
    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    /**
     * @param string|null $address1
     * @return Address
     */
    public function setAddress1(?string $address1): self
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    /**
     * @param string|null $address2
     * @return Address
     */
    public function setAddress2(?string $address2): self
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return Address
     */
    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    /**
     * @param string|null $postCode
     * @return Address
     */
    public function setPostCode(?string $postCode): self
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * @return Country|null
     */
    public function getCountry(): ?Country
    {
        return $this->country;
    }

    /**
     * @param Country|null $country
     * @return Address
     */
    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Zone|null
     */
    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    /**
     * @param Zone|null $zone
     * @return Address
     */
    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

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
     * @return Address
     */
    public function setCustomField(?string $customField): self
    {
        $this->customField = $customField;

        return $this;
    }
}