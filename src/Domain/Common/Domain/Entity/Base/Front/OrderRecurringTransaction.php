<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OrderRecurringTransactionRepository;

/**
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="`oc_order_recurring_transaction`")
 * @ORM\Entity(repositoryClass=OrderRecurringTransactionRepository::class)
 */
class OrderRecurringTransaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`order_recurring_transaction_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity=OrderRecurring::class)
     * @ORM\JoinColumn(name="`order_recurring_id`", referencedColumnName="`order_recurring_id`")
     */
    private ?OrderRecurring $orderRecurring = null;

    /**
     * @ORM\Column(type="string", name="`reference`", length=255)
     */
    private ?string $reference = null;

    /**
     * @ORM\Column(type="string", name="`type`", length=255)
     */
    private ?string $type = null;

    /**
     * @ORM\Column(type="float", name="`amount`")
     */
    private ?float $amount = null;

    /**
     * @ORM\Column(type="datetime_immutable", name="`date_added`")
     */
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
     * @return OrderRecurringTransaction
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return OrderRecurring|null
     */
    public function getOrderRecurring(): ?OrderRecurring
    {
        return $this->orderRecurring;
    }

    /**
     * @param OrderRecurring|null $orderRecurring
     * @return OrderRecurringTransaction
     */
    public function setOrderRecurring(?OrderRecurring $orderRecurring): self
    {
        $this->orderRecurring = $orderRecurring;

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
     * @return OrderRecurringTransaction
     */
    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return OrderRecurringTransaction
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float|null $amount
     * @return OrderRecurringTransaction
     */
    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

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
     * @return OrderRecurringTransaction
     */
    public function setDateAdded(?DateTimeImmutable $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * @ORM\PreUpdate
     * @ORM\PrePersist
     */
    public function updatedTimestamps(): void
    {
        if (null === $this->getDateAdded()) {
            $this->setDateAdded(new DateTimeImmutable());
        }
    }
}