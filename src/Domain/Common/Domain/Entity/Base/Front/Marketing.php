<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\MarketingRepository;

#[ORM\Table(name: "`oc_marketing`")]
#[ORM\Entity(repositoryClass: MarketingRepository::class)]
class Marketing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`marketing_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: "`name`", type: Types::STRING, length: 32)]
    private ?string $name = null;

    #[ORM\Column(name: "`description`", type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(name: "`code`", type: Types::STRING, length: 64)]
    private ?string $code = null;

    #[ORM\Column(name: "`clicks`", type: Types::INTEGER)]
    private ?int $clicks = null;

    #[ORM\Column(name: "`date_added`", type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $dateAdded = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Marketing
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
     * @return Marketing
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Marketing
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
     * @return Marketing
     */
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getClicks(): ?int
    {
        return $this->clicks;
    }

    /**
     * @param int|null $clicks
     * @return Marketing
     */
    public function setClicks(?int $clicks): self
    {
        $this->clicks = $clicks;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDateAdded(): ?DateTimeImmutable
    {
        return $this->dateAdded;
    }

    /**
     * @param DateTimeImmutable|null $dateAdded
     * @return Marketing
     */
    public function setDateAdded(?DateTimeImmutable $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }
}