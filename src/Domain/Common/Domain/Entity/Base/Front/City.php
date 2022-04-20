<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CityRepository;

#[ORM\Table(name: "`oc_city`")]
#[ORM\Index(name: "back_id_idx", columns: ["back_id"])]
#[ORM\Entity(repositoryClass: CityRepository::class)]
class City
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`city_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Zone::class)]
    #[ORM\JoinColumn(name: "`zone_id`", referencedColumnName: "`zone_id`", nullable: true)]
    private ?Zone $zone = null;

    #[ORM\Column(name: "`name`", type: Types::STRING, length: 128)]
    private ?string $name = null;

    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["default" => 1])]
    private ?bool $status = true;

    #[ORM\Column(name: "`code`", type: Types::STRING, length: 32)]
    private ?string $code = null;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER, options: ["default" => 0])]
    private ?int $sortOrder = 0;

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
     * @return City
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

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
     * @return City
     */
    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

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
     * @return City
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

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
     * @return City
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;

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
     * @return City
     */
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    /**
     * @param int|null $sortOrder
     * @return City
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

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
     * @return City
     */
    public function setBackId(?int $backId): self
    {
        $this->backId = $backId;

        return $this;
    }
}