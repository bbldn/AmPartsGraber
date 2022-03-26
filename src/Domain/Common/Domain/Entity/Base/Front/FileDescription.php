<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\FileDescriptionRepository;

/**
 * @ORM\Table(name="`oc_download_description`")
 * @ORM\Entity(repositoryClass=FileDescriptionRepository::class)
 */
class FileDescription
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=File::class, inversedBy="descriptions")
     * @ORM\JoinColumn(name="`download_id`", referencedColumnName="`download_id`")
     */
    private ?File $file = null;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Language::class)
     * @ORM\JoinColumn(name="`language_id`", referencedColumnName="`language_id`")
     */
    private ?Language $language = null;

    /**
     * @ORM\Column(type="string", name="`name`", length=64)
     */
    private ?string $name = null;

    /**
     * @return File|null
     */
    public function getFile(): ?File
    {
        return $this->file;
    }

    /**
     * @param File|null $file
     * @return FileDescription
     */
    public function setFile(?File $file): self
    {
        $this->file = $file;

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
     * @return FileDescription
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
     * @return FileDescription
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}