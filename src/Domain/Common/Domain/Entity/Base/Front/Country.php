<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CountryRepository;

/**
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 * @ORM\Table(name="`oc_country`", indexes={@ORM\Index(name="back_id_idx", columns={"back_id"})})
 */
class Country
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`country_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", name="`name`", length=128)
     */
    private ?string $name = null;

    /**
     * @ORM\Column(type="string", name="`iso_code_2`", length=2)
     */
    private ?string $isoCode2 = null;

    /**
     * @ORM\Column(type="string", name="`iso_code_3`", length=3)
     */
    private ?string $isoCode3 = null;

    /**
     * @ORM\Column(type="text", name="`address_format`")
     */
    private ?string $addressFormat = null;

    /**
     * @ORM\Column(type="boolean", name="`postcode_required`")
     */
    private ?bool $postCodeRequired = null;

    /**
     * @ORM\Column(type="boolean", name="`status`", options={"default": 1})
     */
    private ?bool $status = true;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Country
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
     * @return Country
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIsoCode2(): ?string
    {
        return $this->isoCode2;
    }

    /**
     * @param string|null $isoCode2
     * @return Country
     */
    public function setIsoCode2(?string $isoCode2): self
    {
        $this->isoCode2 = $isoCode2;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIsoCode3(): ?string
    {
        return $this->isoCode3;
    }

    /**
     * @param string|null $isoCode3
     * @return Country
     */
    public function setIsoCode3(?string $isoCode3): self
    {
        $this->isoCode3 = $isoCode3;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddressFormat(): ?string
    {
        return $this->addressFormat;
    }

    /**
     * @param string|null $addressFormat
     * @return Country
     */
    public function setAddressFormat(?string $addressFormat): self
    {
        $this->addressFormat = $addressFormat;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPostCodeRequired(): ?bool
    {
        return $this->postCodeRequired;
    }

    /**
     * @param bool|null $postCodeRequired
     * @return Country
     */
    public function setPostCodeRequired(?bool $postCodeRequired): self
    {
        $this->postCodeRequired = $postCodeRequired;

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
     * @return Country
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }
}