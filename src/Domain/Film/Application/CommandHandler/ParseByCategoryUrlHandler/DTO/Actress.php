<?php

namespace App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\DTO;

use DateTimeImmutable;

class Actress
{
    private ?string $fullName = null;

    private ?string $nationality = null;

    private ?DateTimeImmutable $dob = null;

    private ?int $height = null;

    private ?int $weight = null;

    private ?bool $status = null;

    private ?string $zodiacSign = null;

    private ?string $race = null;

    private ?string $breast = null;

    private ?string $breastSize = null;

    private ?string $eyeColor = null;

    private ?string $hairColor = null;

    private ?int $shoeSize = null;

    private ?int $yearStart = null;

    private ?string $tattoo = null;

    private ?string $piercing = null;

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
}