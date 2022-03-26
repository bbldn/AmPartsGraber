<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CurrencyRepository;

/**
 * @ORM\Entity(repositoryClass=CurrencyRepository::class)
 * @ORM\Table(name="`oc_currency`", indexes={@ORM\Index(name="back_id_idx", columns={"back_id"})})
 */
class Currency
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`currency_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", name="`title`", length=32)
     */
    private ?string $name = null;

    /**
     * @ORM\Column(type="string", name="`code`", length=3)
     */
    private ?string $code = null;

    /**
     * @ORM\Column(type="string", name="`symbol_left`", length=12)
     */
    private ?string $symbolLeft = null;

    /**
     * @ORM\Column(type="string", name="`symbol_right`", length=12)
     */
    private ?string $symbolRight = null;

    /**
     * @ORM\Column(type="string", name="`decimal_place`", length=1)
     */
    private ?string $decimalPlace = null;

    /**
     * @ORM\Column(type="float", name="`value`")
     */
    private ?float $value = null;

    /**
     * @ORM\Column(type="boolean", name="`status`")
     */
    private ?bool $status = null;

    /**
     * @ORM\Column(type="datetime_immutable", name="`date_modified`")
     */
    private ?DateTimeImmutable $dateModified = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Currency
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
     * @param string $name
     * @return Currency
     */
    public function setName(string $name): self
    {
        $this->name = $name;

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
     * @param string $code
     * @return Currency
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSymbolLeft(): ?string
    {
        return $this->symbolLeft;
    }

    /**
     * @param string $symbolLeft
     * @return Currency
     */
    public function setSymbolLeft(string $symbolLeft): self
    {
        $this->symbolLeft = $symbolLeft;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSymbolRight(): ?string
    {
        return $this->symbolRight;
    }

    /**
     * @param string $symbolRight
     * @return Currency
     */
    public function setSymbolRight(string $symbolRight): self
    {
        $this->symbolRight = $symbolRight;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDecimalPlace(): ?string
    {
        return $this->decimalPlace;
    }

    /**
     * @param string $decimalPlace
     * @return Currency
     */
    public function setDecimalPlace(string $decimalPlace): self
    {
        $this->decimalPlace = $decimalPlace;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return Currency
     */
    public function setValue(float $value): self
    {
        $this->value = $value;

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
     * @param bool $status
     * @return Currency
     */
    public function setStatus(bool $status): self
    {
        $this->status = $status;

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
     * @param DateTimeImmutable $dateModified
     * @return Currency
     */
    public function setDateModified(DateTimeImmutable $dateModified): self
    {
        $this->dateModified = $dateModified;

        return $this;
    }
}