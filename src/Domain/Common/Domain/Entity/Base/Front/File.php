<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\FileRepository;

/**
 * @ORM\Table(name="`oc_download`")
 * @ORM\Entity(repositoryClass=FileRepository::class)
 */
class File
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`download_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", name="`filename`", length=160)
     */
    private ?string $filename = null;

    /**
     * @ORM\Column(type="string", name="`mask`", length=128)
     */
    private ?string $mask = null;

    /**
     * @ORM\Column(type="datetime_immutable", name="`date_added`")
     */
    private ?DateTimeImmutable $dateAdded = null;

    /**
     * @var Collection|FileDescription[]
     * @ORM\OneToMany(
     *     mappedBy="file",
     *     orphanRemoval=true,
     *     fetch="EXTRA_LAZY",
     *     cascade={"persist", "remove"},
     *     targetEntity=FileDescription::class
     * )
     *
     * @psalm-var Collection<int, FileDescription>
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
     * @return File
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param string|null $filename
     * @return File
     */
    public function setFilename(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMask(): ?string
    {
        return $this->mask;
    }

    /**
     * @param string|null $mask
     * @return File
     */
    public function setMask(?string $mask): self
    {
        $this->mask = $mask;

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
     * @return File
     */
    public function setDateAdded(?DateTimeImmutable $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * @return FileDescription[]|Collection
     *
     * @psalm-return Collection<int, FileDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}