<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\VoucherThemeDescriptionRepository;

/**
 * @ORM\Table(name="`oc_voucher_theme_description`")
 * @ORM\Entity(repositoryClass=VoucherThemeDescriptionRepository::class)
 */
class VoucherThemeDescription
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=VoucherTheme::class)
     * @ORM\JoinColumn(name="`voucher_theme_id`", referencedColumnName="`voucher_theme_id`")
     */
    private ?VoucherTheme $voucherTheme = null;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Language::class)
     * @ORM\JoinColumn(name="`language_id`", referencedColumnName="`language_id`")
     */
    private ?Language $language = null;

    /**
     * @ORM\Column(type="string", name="`name`", length=32)
     */
    private ?string $name = null;

    /**
     * @return VoucherTheme|null
     */
    public function getVoucherTheme(): ?VoucherTheme
    {
        return $this->voucherTheme;
    }

    /**
     * @param VoucherTheme|null $voucherTheme
     * @return VoucherThemeDescription
     */
    public function setVoucherTheme(?VoucherTheme $voucherTheme): self
    {
        $this->voucherTheme = $voucherTheme;

        return $this;
    }

    /**
     * @return Language|null
     */
    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    /**
     * @param Language|null $language
     * @return VoucherThemeDescription
     */
    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

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
     * @return VoucherThemeDescription
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}