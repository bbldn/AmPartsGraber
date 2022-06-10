<?php

namespace App\Domain\Common\Domain\Entity\Base\Film;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class ActressPiercing
{
    /* Спина */
    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $back = false;

    /* Уши */
    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $ears = false;

    /* Губы */
    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $lips = false;

    /* Шея */
    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $neck = false;

    /* Нос */
    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $nose = false;

    /* Брови */
    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $brows = false;

    /* Пах */
    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $groin = false;

    /* Пупок */
    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $navel = false;

    /* Грудь */
    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $breast = false;

    /* Язык */
    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $tongue = false;

    /* Живот */
    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $abdomen = false;

    /**
     * @return bool|null
     */
    public function getBack(): ?bool
    {
        return $this->back;
    }

    /**
     * @param bool|null $back
     * @return ActressPiercing
     */
    public function setBack(?bool $back): self
    {
        $this->back = $back;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getEars(): ?bool
    {
        return $this->ears;
    }

    /**
     * @param bool|null $ears
     * @return ActressPiercing
     */
    public function setEars(?bool $ears): self
    {
        $this->ears = $ears;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getLips(): ?bool
    {
        return $this->lips;
    }

    /**
     * @param bool|null $lips
     * @return ActressPiercing
     */
    public function setLips(?bool $lips): self
    {
        $this->lips = $lips;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNeck(): ?bool
    {
        return $this->neck;
    }

    /**
     * @param bool|null $neck
     * @return ActressPiercing
     */
    public function setNeck(?bool $neck): self
    {
        $this->neck = $neck;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNose(): ?bool
    {
        return $this->nose;
    }

    /**
     * @param bool|null $nose
     * @return ActressPiercing
     */
    public function setNose(?bool $nose): self
    {
        $this->nose = $nose;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getBrows(): ?bool
    {
        return $this->brows;
    }

    /**
     * @param bool|null $brows
     * @return ActressPiercing
     */
    public function setBrows(?bool $brows): self
    {
        $this->brows = $brows;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getGroin(): ?bool
    {
        return $this->groin;
    }

    /**
     * @param bool|null $groin
     * @return ActressPiercing
     */
    public function setGroin(?bool $groin): self
    {
        $this->groin = $groin;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNavel(): ?bool
    {
        return $this->navel;
    }

    /**
     * @param bool|null $navel
     * @return ActressPiercing
     */
    public function setNavel(?bool $navel): self
    {
        $this->navel = $navel;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getBreast(): ?bool
    {
        return $this->breast;
    }

    /**
     * @param bool|null $breast
     * @return ActressPiercing
     */
    public function setBreast(?bool $breast): self
    {
        $this->breast = $breast;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getTongue(): ?bool
    {
        return $this->tongue;
    }

    /**
     * @param bool|null $tongue
     * @return ActressPiercing
     */
    public function setTongue(?bool $tongue): self
    {
        $this->tongue = $tongue;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAbdomen(): ?bool
    {
        return $this->abdomen;
    }

    /**
     * @param bool|null $abdomen
     * @return ActressPiercing
     */
    public function setAbdomen(?bool $abdomen): self
    {
        $this->abdomen = $abdomen;

        return $this;
    }
}