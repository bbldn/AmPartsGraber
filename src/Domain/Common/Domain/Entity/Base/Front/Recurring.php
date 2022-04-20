<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\RecurringRepository;

#[ORM\Table(name: "`oc_recurring`")]
#[ORM\Entity(repositoryClass: RecurringRepository::class)]
class Recurring
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`recurring_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: "`price`", type: Types::FLOAT, columnDefinition: 'DECIMAL(10,4)')]
    private ?float $price = 0.0;

    #[ORM\Column(
        name: "`frequency`",
        type: Types::STRING,
        columnDefinition: "ENUM('day', 'week', 'semi_month', 'month', 'year')")
    ]
    private ?string $frequency = null;

    #[ORM\Column(name: "`duration`", type: Types::INTEGER, options: ["unsigned" => true])]
    private ?int $duration = null;

    #[ORM\Column(name: "`cycle`", type: Types::INTEGER, options: ["unsigned" => true])]
    private ?int $cycle = null;

    #[ORM\Column(name: "`trial_status`", type: Types::SMALLINT, columnDefinition: 'TINYINT')]
    private ?int $trialStatus = null;

    #[ORM\Column(name: "`trial_price`", type: Types::FLOAT, columnDefinition: 'DECIMAL(10,4)')]
    private ?int $trialPrice = null;

    #[ORM\Column(
        type: Types::STRING,
        name: "`trial_frequency`",
        columnDefinition: "ENUM('day', 'week', 'semi_month', 'month', 'year')")
    ]
    private ?string $trialFrequency = null;

    #[ORM\Column(name: "`trial_duration`", type: Types::INTEGER, options: ["unsigned" => true])]
    private ?int $trialDuration = null;

    #[ORM\Column(name: "`trial_cycle`", type: Types::INTEGER, options: ["unsigned" => true])]
    private ?int $trialCycle = null;

    #[ORM\Column(name: "`status`", type: Types::SMALLINT, columnDefinition: 'TINYINT')]
    private ?int $status = null;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER)]
    private ?int $sortOrder = null;

    /** @var Collection<int, RecurringDescription> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "recurring",
        cascade: ["persist", "remove"],
        targetEntity: RecurringDescription::class
    )]
    private Collection $descriptions;

    public function __construct()
    {
        $this->descriptions = new ArrayCollection();
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
     * @return Recurring
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return Recurring
     */
    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFrequency(): ?string
    {
        return $this->frequency;
    }

    /**
     * @param string|null $frequency
     * @return Recurring
     */
    public function setFrequency(?string $frequency): self
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @param int|null $duration
     * @return Recurring
     */
    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCycle(): ?int
    {
        return $this->cycle;
    }

    /**
     * @param int|null $cycle
     * @return Recurring
     */
    public function setCycle(?int $cycle): self
    {
        $this->cycle = $cycle;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTrialStatus(): ?int
    {
        return $this->trialStatus;
    }

    /**
     * @param int|null $trialStatus
     * @return Recurring
     */
    public function setTrialStatus(?int $trialStatus): self
    {
        $this->trialStatus = $trialStatus;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTrialPrice(): ?int
    {
        return $this->trialPrice;
    }

    /**
     * @param int|null $trialPrice
     * @return Recurring
     */
    public function setTrialPrice(?int $trialPrice): self
    {
        $this->trialPrice = $trialPrice;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTrialFrequency(): ?string
    {
        return $this->trialFrequency;
    }

    /**
     * @param string|null $trialFrequency
     * @return Recurring
     */
    public function setTrialFrequency(?string $trialFrequency): self
    {
        $this->trialFrequency = $trialFrequency;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTrialDuration(): ?int
    {
        return $this->trialDuration;
    }

    /**
     * @param int|null $trialDuration
     * @return Recurring
     */
    public function setTrialDuration(?int $trialDuration): self
    {
        $this->trialDuration = $trialDuration;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTrialCycle(): ?int
    {
        return $this->trialCycle;
    }

    /**
     * @param int|null $trialCycle
     * @return Recurring
     */
    public function setTrialCycle(?int $trialCycle): self
    {
        $this->trialCycle = $trialCycle;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int|null $status
     * @return Recurring
     */
    public function setStatus(?int $status): self
    {
        $this->status = $status;

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
     * @return Recurring
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return Collection<int, RecurringDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}