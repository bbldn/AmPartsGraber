<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OrderRecurringTransactionRepository;

#[ORM\HasLifecycleCallbacks]
#[ORM\Table(name: "`oc_order_recurring_transaction`")]
#[ORM\Entity(repositoryClass: OrderRecurringTransactionRepository::class)]
class OrderRecurringTransaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`order_recurring_transaction_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: OrderRecurring::class)]
    #[ORM\JoinColumn(name: "`order_recurring_id`", referencedColumnName: "`order_recurring_id`", nullable: true)]
    private ?OrderRecurring $orderRecurring = null;

    #[ORM\Column(name: "`reference`", type: Types::STRING, length: 255)]
    private ?string $reference = null;

    #[ORM\Column(name: "`type`", type: Types::STRING, length: 255)]
    private ?string $type = null;

    #[ORM\Column(name: "`amount`", type: Types::FLOAT, columnDefinition: 'DECIMAL(10,4)')]
    private ?float $amount = null;

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

    #[ORM\PreUpdate]
    #[ORM\PrePersist]
    public function updatedTimestamps(): void
    {
        if (null === $this->getDateAdded()) {
            $this->setDateAdded(new DateTimeImmutable());
        }
    }
}