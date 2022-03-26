<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\VoucherThemeRepository;

/**
 * @ORM\Table(name="`oc_voucher_theme`")
 * @ORM\Entity(repositoryClass=VoucherThemeRepository::class)
 */
class VoucherTheme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`voucher_theme_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", name="`image`", length=255)
     */
    private ?string $image = null;

    /**
     * @var Collection|VoucherThemeDescription[]
     * @ORM\OneToMany(
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true,
     *     mappedBy="voucherTheme",
     *     cascade={"persist", "remove"},
     *     targetEntity=VoucherThemeDescription::class
     * )
     *
     * @psalm-var Collection<int, VoucherThemeDescription>
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
     * @return VoucherTheme
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     * @return VoucherTheme
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return VoucherThemeDescription[]|Collection
     *
     * @psalm-return Collection<int, VoucherThemeDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}