<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ZoneRepository;

#[ORM\HasLifecycleCallbacks]
#[ORM\Table(name: "`oc_zone`")]
#[ORM\Index(name: "back_id_idx", columns: ["back_id"])]
#[ORM\Entity(repositoryClass: ZoneRepository::class)]
class Zone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`zone_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Country::class)]
    #[ORM\JoinColumn(name: "`country_id`", referencedColumnName: "`country_id`", nullable: true)]
    private ?Country $country = null;

    #[ORM\Column(name: "`name`", type: Types::STRING, length: 128)]
    private ?string $name = null;

    #[ORM\Column(name: "`code`", type: Types::STRING, length: 32)]
    private ?string $code = null;

    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["default" => 1])]
    private ?bool $status = true;

    #[ORM\Column(name: "`ref`", type: Types::STRING, length: 36)]
    private ?string $ref = null;

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

    /**
     * @return int|null
     */
    public function getBackId(): ?int
    {
        return $this->backId;
    }

    /**
     * @param int|null $backId
     * @return Zone
     */
    public function setBackId(?int $backId): Zone
    {
        $this->backId = $backId;

        return $this;
    }
}