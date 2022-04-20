<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CurrencyRepository;

#[ORM\Table(name: "`oc_currency`")]
#[ORM\Index(name: "back_id_idx", columns: ["back_id"])]
#[ORM\Entity(repositoryClass: CurrencyRepository::class)]
class Currency
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`currency_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: "`title`", type: Types::STRING, length: 32)]
    private ?string $name = null;

    #[ORM\Column(name: "`code`", type: Types::STRING, length: 3)]
    private ?string $code = null;

    #[ORM\Column(name: "`symbol_left`", type: Types::STRING, length: 12)]
    private ?string $symbolLeft = null;

    #[ORM\Column(name: "`symbol_right`", type: Types::STRING, length: 12)]
    private ?string $symbolRight = null;

    #[ORM\Column(name: "`decimal_place`", type: Types::STRING, length: 1)]
    private ?string $decimalPlace = null;

    #[ORM\Column(name: "`value`", type: Types::FLOAT, columnDefinition: 'DOUBLE(15,8)')]
    private ?float $value = null;

    #[ORM\Column(name: "`status`", type: Types::BOOLEAN)]
    private ?bool $status = null;

    #[ORM\Column(name: "`date_modified`", type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $dateModified = null;

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
     * @param string|null $name
     * @return Currency
     */
    public function setName(?string $name): self
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
     * @param string|null $code
     * @return Currency
     */
    public function setCode(?string $code): self
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
     * @param string|null $symbolLeft
     * @return Currency
     */
    public function setSymbolLeft(?string $symbolLeft): self
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
     * @param string|null $symbolRight
     * @return Currency
     */
    public function setSymbolRight(?string $symbolRight): self
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
     * @param string|null $decimalPlace
     * @return Currency
     */
    public function setDecimalPlace(?string $decimalPlace): self
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
     * @param float|null $value
     * @return Currency
     */
    public function setValue(?float $value): self
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
     * @param bool|null $status
     * @return Currency
     */
    public function setStatus(?bool $status): self
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
     * @param DateTimeImmutable|null $dateModified
     * @return Currency
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
     * @return Currency
     */
    public function setBackId(?int $backId): self
    {
        $this->backId = $backId;

        return $this;
    }
}