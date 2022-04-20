<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OrderRecurringRepository;

#[ORM\HasLifecycleCallbacks]
#[ORM\Table(name: "`oc_order_recurring`")]
#[ORM\Entity(repositoryClass: OrderRecurringRepository::class)]
class OrderRecurring
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`order_recurring_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Order::class)]
    #[ORM\JoinColumn(name: "`order_id`", referencedColumnName: "`order_id`", nullable: true)]
    private ?Order $order = null;

    #[ORM\Column(name: "`reference`", type: Types::STRING, length: 255)]
    private ?string $reference = null;

    #[ORM\ManyToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(name: "`product_id`", referencedColumnName: "`product_id`", nullable: true)]
    private ?Product $product = null;

    #[ORM\Column(name: "`product_name`", type: Types::STRING, length: 255)]
    private ?string $productName = null;

    #[ORM\Column(name: "`product_quantity`", type: Types::INTEGER)]
    private ?int $productQuantity = null;

    #[ORM\ManyToOne(targetEntity: Recurring::class)]
    #[ORM\JoinColumn(name: "`recurring_id`", referencedColumnName: "`recurring_id`", nullable: true)]
    private ?Recurring $recurring = null;

    #[ORM\Column(name: "`recurring_name`", type: Types::STRING, length: 255)]
    private ?string $recurringName = null;

    #[ORM\Column(name: "`recurring_description`", type: Types::STRING, length: 255)]
    private ?string $recurringDescription = null;

    #[ORM\Column(name: "`recurring_frequency`", type: Types::STRING, length: 25)]
    private ?string $recurringFrequency = null;

    #[ORM\Column(name: "`recurring_cycle`", type: Types::SMALLINT)]
    private ?int $recurringCycle = null;

    #[ORM\Column(name: "`recurring_duration`", type: Types::SMALLINT)]
    private ?int $recurringDuration = null;

    #[ORM\Column(name: "`recurring_price`", type: Types::FLOAT, columnDefinition: 'DECIMAL(10,4)')]
    private ?float $recurringPrice = null;

    #[ORM\Column(name: "`trial`", type: Types::BOOLEAN)]
    private ?bool $trial = null;

    #[ORM\Column(name: "`trial_frequency`", type: Types::STRING, length: 25)]
    private ?string $trialFrequency = null;

    #[ORM\Column(name: "`trial_cycle`", type: Types::SMALLINT)]
    private ?int $trialCycle = null;

    #[ORM\Column(name: "`trial_duration`", type: Types::SMALLINT)]
    private ?int $trialDuration = null;

    #[ORM\Column(name: "`trial_price`", type: Types::FLOAT, columnDefinition: 'DECIMAL(10,4)')]
    private ?float $trialPrice = null;

    #[ORM\Column(name: "`status`", type: Types::BOOLEAN)]
    private ?bool $status = null;

    #[ORM\Column(name: "`date_added`", type: Types::DATETIME_IMMUTABLE)]
    private ?DateTimeImmutable $dateAdded = null;

    /** @var Collection<int, OrderRecurringTransaction> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "orderRecurring",
        cascade: ["persist", "remove"],
        targetEntity: OrderRecurringTransaction::class
    )]
    private Collection $transactions;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
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
     * @return OrderRecurring
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Order|null
     */
    public function getOrder(): ?Order
    {
        return $this->order;
    }

    /**
     * @param Order|null $order
     * @return OrderRecurring
     */
    public function setOrder(?Order $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     * @return OrderRecurring
     */
    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     * @return OrderRecurring
     */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProductName(): ?string
    {
        return $this->productName;
    }

    /**
     * @param string|null $productName
     * @return OrderRecurring
     */
    public function setProductName(?string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getProductQuantity(): ?int
    {
        return $this->productQuantity;
    }

    /**
     * @param int|null $productQuantity
     * @return OrderRecurring
     */
    public function setProductQuantity(?int $productQuantity): self
    {
        $this->productQuantity = $productQuantity;

        return $this;
    }

    /**
     * @return Recurring|null
     */
    public function getRecurring(): ?Recurring
    {
        return $this->recurring;
    }

    /**
     * @param Recurring|null $recurring
     * @return OrderRecurring
     */
    public function setRecurring(?Recurring $recurring): self
    {
        $this->recurring = $recurring;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRecurringName(): ?string
    {
        return $this->recurringName;
    }

    /**
     * @param string|null $recurringName
     * @return OrderRecurring
     */
    public function setRecurringName(?string $recurringName): self
    {
        $this->recurringName = $recurringName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRecurringDescription(): ?string
    {
        return $this->recurringDescription;
    }

    /**
     * @param string|null $recurringDescription
     * @return OrderRecurring
     */
    public function setRecurringDescription(?string $recurringDescription): self
    {
        $this->recurringDescription = $recurringDescription;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRecurringFrequency(): ?string
    {
        return $this->recurringFrequency;
    }

    /**
     * @param string|null $recurringFrequency
     * @return OrderRecurring
     */
    public function setRecurringFrequency(?string $recurringFrequency): self
    {
        $this->recurringFrequency = $recurringFrequency;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getRecurringCycle(): ?int
    {
        return $this->recurringCycle;
    }

    /**
     * @param int|null $recurringCycle
     * @return OrderRecurring
     */
    public function setRecurringCycle(?int $recurringCycle): self
    {
        $this->recurringCycle = $recurringCycle;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getRecurringDuration(): ?int
    {
        return $this->recurringDuration;
    }

    /**
     * @param int|null $recurringDuration
     * @return OrderRecurring
     */
    public function setRecurringDuration(?int $recurringDuration): self
    {
        $this->recurringDuration = $recurringDuration;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getRecurringPrice(): ?float
    {
        return $this->recurringPrice;
    }

    /**
     * @param float|null $recurringPrice
     * @return OrderRecurring
     */
    public function setRecurringPrice(?float $recurringPrice): self
    {
        $this->recurringPrice = $recurringPrice;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getTrial(): ?bool
    {
        return $this->trial;
    }

    /**
     * @param bool|null $trial
     * @return OrderRecurring
     */
    public function setTrial(?bool $trial): self
    {
        $this->trial = $trial;

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
     * @return OrderRecurring
     */
    public function setTrialFrequency(?string $trialFrequency): self
    {
        $this->trialFrequency = $trialFrequency;

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
     * @return OrderRecurring
     */
    public function setTrialCycle(?int $trialCycle): self
    {
        $this->trialCycle = $trialCycle;

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
     * @return OrderRecurring
     */
    public function setTrialDuration(?int $trialDuration): self
    {
        $this->trialDuration = $trialDuration;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTrialPrice(): ?float
    {
        return $this->trialPrice;
    }

    /**
     * @param float|null $trialPrice
     * @return OrderRecurring
     */
    public function setTrialPrice(?float $trialPrice): self
    {
        $this->trialPrice = $trialPrice;

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
     * @return OrderRecurring
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;

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
     * @return OrderRecurring
     */
    public function setDateAdded(?DateTimeImmutable $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * @return Collection<int, OrderRecurringTransaction>
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    #[ORM\PreUpdate]
    #[ORM\PrePersist]
    public function updatedTimestamps(): void
    {
        if (null === $this->getDateAdded()) {
            $this->setDateAdded(new DateTimeImmutable());
        }
    }
}