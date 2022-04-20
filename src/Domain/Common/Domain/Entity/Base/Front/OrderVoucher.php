<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OrderVoucherRepository;

#[ORM\Table(name: "`oc_order_voucher`")]
#[ORM\Entity(repositoryClass: OrderVoucherRepository::class)]
class OrderVoucher
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`order_voucher_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Order::class)]
    #[ORM\JoinColumn(name: "`order_id`", referencedColumnName: "`order_id`", nullable: true)]
    private ?Order $order = null;

    #[ORM\ManyToOne(targetEntity: Voucher::class)]
    #[ORM\JoinColumn(name: "`voucher_id`", referencedColumnName: "`voucher_id`", nullable: true)]
    private ?Voucher $voucher = null;

    #[ORM\Column(name: "`description`", type: Types::STRING, length: 255)]
    private ?string $description = null;

    #[ORM\Column(name: "`code`", type: Types::STRING, length: 10)]
    private ?string $code = null;

    #[ORM\Column(name: "`from_name`", type: Types::STRING, length: 64)]
    private ?string $fromName = null;

    #[ORM\Column(name: "`from_email`", type: Types::STRING, length: 96)]
    private ?string $fromEmail = null;

    #[ORM\Column(name: "`to_name`", type: Types::STRING, length: 64)]
    private ?string $toName = null;

    #[ORM\Column(name: "`to_email`", type: Types::STRING, length: 96)]
    private ?string $toEmail = null;

    #[ORM\ManyToOne(targetEntity: VoucherTheme::class)]
    #[ORM\JoinColumn(name: "`voucher_theme_id`", referencedColumnName: "`voucher_theme_id`", nullable: true)]
    private ?VoucherTheme $voucherTheme = null;

    #[ORM\Column(name: "`message`", type: Types::TEXT)]
    private ?string $message = null;

    #[ORM\Column(name: "`amount`", type: Types::FLOAT, columnDefinition: 'DECIMAL(15,4)')]
    private ?float $amount = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return OrderVoucher
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
     * @return OrderVoucher
     */
    public function setOrder(?Order $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return Voucher|null
     */
    public function getVoucher(): ?Voucher
    {
        return $this->voucher;
    }

    /**
     * @param Voucher|null $voucher
     * @return OrderVoucher
     */
    public function setVoucher(?Voucher $voucher): self
    {
        $this->voucher = $voucher;

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
     * @return OrderVoucher
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
     * @return OrderVoucher
     */
    public function setCode(?string $code): self
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
     * @return OrderVoucher
     */
    public function setFromName(?string $fromName): self
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
     * @return OrderVoucher
     */
    public function setFromEmail(?string $fromEmail): self
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
     * @return OrderVoucher
     */
    public function setToName(?string $toName): self
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
     * @return OrderVoucher
     */
    public function setToEmail(?string $toEmail): self
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
     * @return OrderVoucher
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
     * @return OrderVoucher
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
     * @return OrderVoucher
     */
    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }
}