<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\VoucherRepository;

/**
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="`oc_voucher`")
 * @ORM\Entity(repositoryClass=VoucherRepository::class)
 */
class Voucher
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`voucher_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class)
     * @ORM\JoinColumn(name="`order_id`", referencedColumnName="`order_id`")
     */
    private ?Order $order = null;

    /**
     * @ORM\Column(type="string", name="`code`", length=10)
     */
    private ?string $code = null;

    /**
     * @ORM\Column(type="string", name="`from_name`", length=64)
     */
    private ?string $fromName = null;

    /**
     * @ORM\Column(type="string", name="`from_email`", length=96)
     */
    private ?string $fromEmail = null;

    /**
     * @ORM\Column(type="string", name="`to_name`", length=64)
     */
    private ?string $toName = null;

    /**
     * @ORM\Column(type="string", name="`to_email`", length=96)
     */
    private ?string $toEmail = null;

    /**
     * @ORM\ManyToOne(targetEntity=VoucherTheme::class)
     * @ORM\JoinColumn(name="`voucher_theme_id`", referencedColumnName="`voucher_theme_id`")
     */
    private ?VoucherTheme $voucherTheme = null;

    /**
     * @ORM\Column(type="string", name="`message`", length=255)
     */
    private ?string $message = null;

    /**
     * @ORM\Column(type="float", name="`amount`")
     */
    private ?float $amount = null;

    /**
     * @ORM\Column(type="boolean", name="`status`", options={"default": 0})
     */
    private ?bool $status = false;

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
     * @return Voucher
     */
    public function setId(?int $id): Voucher
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
     * @return Voucher
     */
    public function setOrder(?Order $order): Voucher
    {
        $this->order = $order;

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
     * @return Voucher
     */
    public function setCode(?string $code): Voucher
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFromName(): ?string
    {
        return $this->fromName;
    }

    /**
     * @param string|null $fromName
     * @return Voucher
     */
    public function setFromName(?string $fromName): Voucher
    {
        $this->fromName = $fromName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFromEmail(): ?string
    {
        return $this->fromEmail;
    }

    /**
     * @param string|null $fromEmail
     * @return Voucher
     */
    public function setFromEmail(?string $fromEmail): Voucher
    {
        $this->fromEmail = $fromEmail;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getToName(): ?string
    {
        return $this->toName;
    }

    /**
     * @param string|null $toName
     * @return Voucher
     */
    public function setToName(?string $toName): Voucher
    {
        $this->toName = $toName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getToEmail(): ?string
    {
        return $this->toEmail;
    }

    /**
     * @param string|null $toEmail
     * @return Voucher
     */
    public function setToEmail(?string $toEmail): Voucher
    {
        $this->toEmail = $toEmail;

        return $this;
    }

    /**
     * @return VoucherTheme|null
     */
    public function getVoucherTheme(): ?VoucherTheme
    {
        return $this->voucherTheme;
    }

    /**
     * @param VoucherTheme|null $voucherTheme
     * @return Voucher
     */
    public function setVoucherTheme(?VoucherTheme $voucherTheme): self
    {
        $this->voucherTheme = $voucherTheme;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     * @return Voucher
     */
    public function setMessage(?string $message): self
    {
        $this->message = $message;

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
     * @return Voucher
     */
    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

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
     * @return Voucher
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
     * @return Voucher
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