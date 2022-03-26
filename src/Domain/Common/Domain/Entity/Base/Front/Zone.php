<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ZoneRepository;

/**
 * @ORM\Entity(repositoryClass=ZoneRepository::class)
 * @ORM\Table(name="`oc_zone`", indexes={@ORM\Index(name="back_id_idx", columns={"back_id"})})
 */
class Zone
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`zone_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumn(name="`country_id`", referencedColumnName="`country_id`")
     */
    private ?Country $country = null;

    /**
     * @ORM\Column(type="string", name="`name`", length=128)
     */
    private ?string $name = null;

    /**
     * @ORM\Column(type="string", name="`code`", length=32)
     */
    private ?string $code = null;

    /**
     * @ORM\Column(type="boolean", name="`status`")
     */
    private ?bool $status = null;

    /**
     * @ORM\Column(type="string", name="`ref`", length=36)
     */
    private ?string $ref = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Zone
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

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
     * @return Zone
     */
    public function setCountry(?Country $country): self
    {
        $this->country = $country;

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
     * @return Zone
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
     * @return Zone
     */
    public function setCode(?string $code): self
    {
        $this->code = $code;

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
     * @return Zone
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRef(): ?string
    {
        return $this->ref;
    }

    /**
     * @param string|null $ref
     * @return Zone
     */
    public function setRef(?string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }
}