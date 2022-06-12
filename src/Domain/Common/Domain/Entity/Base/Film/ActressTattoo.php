<?php

namespace App\Domain\Common\Domain\Entity\Base\Film;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class ActressTattoo
{
    /* Спина */
    #[ORM\Column(name: "`back`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $back = false;

    /* Голова */
    #[ORM\Column(name: "`head`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $head = false;

    /* Ноги */
    #[ORM\Column(name: "`legs`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $legs = false;

    /* Шея */
    #[ORM\Column(name: "`neck`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $neck = false;

    /* Пах */
    #[ORM\Column(name: "`groin`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $groin = false;

    /* Руки */
    #[ORM\Column(name: "`hands`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $hands = false;

    /* Грудь */
    #[ORM\Column(name: "`breast`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $breast = false;

    /* Живот */
    #[ORM\Column(name: "`abdomen`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $abdomen = false;

    /* Низ Спины */
    #[ORM\Column(name: "`lower_back`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $lowerBack = false;

    /**
     * @return bool|null
     */
    public function getBack(): ?bool
    {
        return $this->back;
    }

    /**
     * @param bool|null $back
     * @return ActressTattoo
     */
    public function setBack(?bool $back): self
    {
        $this->back = $back;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHead(): ?bool
    {
        return $this->head;
    }

    /**
     * @param bool|null $head
     * @return ActressTattoo
     */
    public function setHead(?bool $head): self
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getLegs(): ?bool
    {
        return $this->legs;
    }

    /**
     * @param bool|null $legs
     * @return ActressTattoo
     */
    public function setLegs(?bool $legs): self
    {
        $this->legs = $legs;

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
     * @return ActressTattoo
     */
    public function setNeck(?bool $neck): self
    {
        $this->neck = $neck;

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
     * @return ActressTattoo
     */
    public function setGroin(?bool $groin): self
    {
        $this->groin = $groin;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHands(): ?bool
    {
        return $this->hands;
    }

    /**
     * @param bool|null $hands
     * @return ActressTattoo
     */
    public function setHands(?bool $hands): self
    {
        $this->hands = $hands;

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
     * @return ActressTattoo
     */
    public function setBreast(?bool $breast): self
    {
        $this->breast = $breast;

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
     * @return ActressTattoo
     */
    public function setAbdomen(?bool $abdomen): self
    {
        $this->abdomen = $abdomen;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getLowerBack(): ?bool
    {
        return $this->lowerBack;
    }

    /**
     * @param bool|null $lowerBack
     * @return ActressTattoo
     */
    public function setLowerBack(?bool $lowerBack): self
    {
        $this->lowerBack = $lowerBack;

        return $this;
    }
}