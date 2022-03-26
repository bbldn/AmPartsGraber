<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\RecurringRepository;

/**
 * @ORM\Table(name="`oc_recurring`")
 * @ORM\Entity(repositoryClass=RecurringRepository::class)
 */
class Recurring
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`recurring_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="float", name="`price`")
     */
    private ?float $price = 0.0;

    /**
     * @ORM\Column(
     *     type="string",
     *     name="`frequency`",
     *     columnDefinition="ENUM('day', 'week', 'semi_month', 'month', 'year')"
     * )
     */
    private ?string $frequency = null;

    /**
     * @ORM\Column(type="integer", name="`duration`", options={"unsigned":true})
     */
    private ?int $duration = null;

    /**
     * @ORM\Column(type="integer", name="`cycle`", options={"unsigned":true})
     */
    private ?int $cycle = null;

    /**
     * @ORM\Column(type="smallint", name="`trial_status`")
     */
    private ?int $trialStatus = null;

    /**
     * @ORM\Column(type="float", name="`trial_price`")
     */
    private ?int $trialPrice = null;

    /**
     * @ORM\Column(
     *     type="string",
     *     name="`trial_frequency`",
     *     columnDefinition="ENUM('day', 'week', 'semi_month', 'month', 'year')"
     * )
     */
    private ?string $trialFrequency = null;

    /**
     * @ORM\Column(type="integer", name="`trial_duration`", options={"unsigned":true})
     */
    private ?int $trialDuration = null;

    /**
     * @ORM\Column(type="integer", name="`trial_cycle`", options={"unsigned":true})
     */
    private ?int $trialCycle = null;

    /**
     * @ORM\Column(type="smallint", name="`status`")
     */
    private ?int $status = null;

    /**
     * @ORM\Column(type="integer", name="`sort_order`")
     */
    private ?int $sortOrder = null;

    /**
     * @var Collection|RecurringDescription[]
     * @ORM\OneToMany(
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true,
     *     mappedBy="recurring",
     *     cascade={"persist", "remove"},
     *     targetEntity=RecurringDescription::class
     * )
     *
     * @psalm-var Collection<int, RecurringDescription>
     */
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
     * @return RecurringDescription[]|Collection
     *
     * @psalm-return Collection<int, RecurringDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}