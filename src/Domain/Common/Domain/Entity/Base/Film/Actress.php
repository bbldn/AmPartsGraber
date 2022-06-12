<?php

namespace App\Domain\Common\Domain\Entity\Base\Film;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Film\ActressRepository;

#[ORM\Table(name: "`actresses`")]
#[ORM\Index(name: 'actresses_dob_idx', columns: ['dob'])]
#[ORM\Index(name: 'actresses_height_idx', columns: ['height'])]
#[ORM\Index(name: 'actresses_status_idx', columns: ['status'])]
#[ORM\Index(name: 'actresses_weight_idx', columns: ['weight'])]
#[ORM\Index(name: 'actresses_full_name_idx', columns: ['full_name'])]
#[ORM\Index(name: 'actresses_zodiac_sign_idx', columns: ['zodiac_sign'])]
#[ORM\Entity(repositoryClass: ActressRepository::class)]
class Actress
{
    /* Идентификатор */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`id`", type: Types::INTEGER, options: ["unsigned" => true])]
    private ?int $id = null;

    /* Полное имя */
    #[ORM\Column(name: "`full_name`", type: Types::STRING, length: 512)]
    private ?string $fullName = null;

    /* Национальность */
    #[ORM\Column(name: "`nationality`", type: Types::STRING, length: 50, nullable: true)]
    private ?string $nationality = null;

    /* Дата рождения */
    #[ORM\Column(name: "`dob`", type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?DateTimeImmutable $dob = null;

    /* Рост */
    #[ORM\Column(name: "`height`", type: Types::INTEGER, nullable: true, options: ["unsigned" => true])]
    private ?int $height = null;

    /* Вес */
    #[ORM\Column(name: "`weight`", type: Types::INTEGER, nullable: true, options: ["unsigned" => true])]
    private ?int $weight = null;

    /* 0 - закончила карьеру, 1 - продолжает */
    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["default" => 1])]
    private ?bool $status = null;

    /* Знак зодиака */
    #[ORM\Column(name: "`zodiac_sign`", type: Types::STRING, length: 10, nullable: true)]
    private ?string $zodiacSign = null;

    /* Раса */
    #[ORM\Column(name: "`race`", type: Types::STRING, length: 20, nullable: true)]
    private ?string $race = null;

    /* Бюст */
    #[ORM\Column(name: "`breast`", type: Types::STRING, length: 20, nullable: true)]
    private ?string $breast = null;

    /* Размер груди */
    #[ORM\Column(name: "`breast_size`", type: Types::STRING, length: 10, nullable: true)]
    private ?string $breastSize = null;

    /* Цвет глаз */
    #[ORM\Column(name: "`eye_color`", type: Types::STRING, length: 20, nullable: true)]
    private ?string $eyeColor = null;

    /* Цвет волос */
    #[ORM\Column(name: "`hair_color`", type: Types::STRING, length: 20, nullable: true)]
    private ?string $hairColor = null;

    /* Размер обуви */
    #[ORM\Column(name: "`shoe_size`", type: Types::SMALLINT, nullable: true)]
    private ?int $shoeSize = null;

    /* Год начала Карьеры */
    #[ORM\Column(name: "`year_start`", type: Types::SMALLINT, nullable: true)]
    private ?int $yearStart = null;

    /* Татуировки */
    #[ORM\Column(name: "`tattoo`", type: Types::STRING, length: 512, nullable: true)]
    private ?string $tattoo = null;

    /* Пирсинг */
    #[ORM\Column(name: "`piercing`", type: Types::STRING, length: 512, nullable: true)]
    private ?string $piercing = null;

    /* Пирсинг (подробно) */
    #[ORM\Embedded(columnPrefix: 'piercing_')]
    private ActressPiercing $actressPiercing;

    public function __construct()
    {
        $this->actressPiercing = new ActressPiercing();
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
     * @return Actress
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param string|null $fullName
     * @return Actress
     */
    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    /**
     * @param string|null $nationality
     * @return Actress
     */
    public function setNationality(?string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDob(): ?DateTimeImmutable
    {
        return $this->dob;
    }

    /**
     * @param DateTimeImmutable|null $dob
     * @return Actress
     */
    public function setDob(?DateTimeImmutable $dob): self
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int|null $height
     * @return Actress
     */
    public function setHeight(?int $height): self
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getWeight(): ?int
    {
        return $this->weight;
    }

    /**
     * @param int|null $weight
     * @return Actress
     */
    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

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
     * @return Actress
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getZodiacSign(): ?string
    {
        return $this->zodiacSign;
    }

    /**
     * @param string|null $zodiacSign
     * @return Actress
     */
    public function setZodiacSign(?string $zodiacSign): self
    {
        $this->zodiacSign = $zodiacSign;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRace(): ?string
    {
        return $this->race;
    }

    /**
     * @param string|null $race
     * @return Actress
     */
    public function setRace(?string $race): self
    {
        $this->race = $race;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBreast(): ?string
    {
        return $this->breast;
    }

    /**
     * @param string|null $breast
     * @return Actress
     */
    public function setBreast(?string $breast): self
    {
        $this->breast = $breast;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBreastSize(): ?string
    {
        return $this->breastSize;
    }

    /**
     * @param string|null $breastSize
     * @return Actress
     */
    public function setBreastSize(?string $breastSize): self
    {
        $this->breastSize = $breastSize;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEyeColor(): ?string
    {
        return $this->eyeColor;
    }

    /**
     * @param string|null $eyeColor
     * @return Actress
     */
    public function setEyeColor(?string $eyeColor): self
    {
        $this->eyeColor = $eyeColor;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getHairColor(): ?string
    {
        return $this->hairColor;
    }

    /**
     * @param string|null $hairColor
     * @return Actress
     */
    public function setHairColor(?string $hairColor): self
    {
        $this->hairColor = $hairColor;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getShoeSize(): ?int
    {
        return $this->shoeSize;
    }

    /**
     * @param int|null $shoeSize
     * @return Actress
     */
    public function setShoeSize(?int $shoeSize): self
    {
        $this->shoeSize = $shoeSize;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getYearStart(): ?int
    {
        return $this->yearStart;
    }

    /**
     * @param int|null $yearStart
     * @return Actress
     */
    public function setYearStart(?int $yearStart): self
    {
        $this->yearStart = $yearStart;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTattoo(): ?string
    {
        return $this->tattoo;
    }

    /**
     * @param string|null $tattoo
     * @return Actress
     */
    public function setTattoo(?string $tattoo): self
    {
        $this->tattoo = $tattoo;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPiercing(): ?string
    {
        return $this->piercing;
    }

    /**
     * @param string|null $piercing
     * @return Actress
     */
    public function setPiercing(?string $piercing): self
    {
        $this->piercing = $piercing;

        return $this;
    }

    /**
     * @return ActressPiercing
     */
    public function getActressPiercing(): ActressPiercing
    {
        return $this->actressPiercing;
    }
}