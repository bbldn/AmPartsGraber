<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\LanguageRepository;

#[ORM\Table(name: "`oc_language`")]
#[ORM\Index(name: "back_id_idx", columns: ["back_id"])]
#[ORM\Entity(repositoryClass: LanguageRepository::class)]
class Language
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`language_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: "`name`", type: Types::STRING, length: 32)]
    private ?string $name = null;

    #[ORM\Column(name: "`code`", type: Types::STRING, length: 5)]
    private ?string $code = null;

    #[ORM\Column(name: "`locale`", type: Types::STRING, length: 255)]
    private ?string $locale = null;

    #[ORM\Column(name: "`image`", type: Types::STRING, length: 64)]
    private ?string $image = null;

    #[ORM\Column(name: "`directory`", type: Types::STRING, length: 32)]
    private ?string $directory = null;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER, options: ["default" => 0])]
    private ?int $sortOrder = 0;

    #[ORM\Column(name: "`status`", type: Types::BOOLEAN)]
    private ?bool $status = null;

    #[ORM\Column(name: "`back_id`", type: Types::INTEGER, nullable: true)]
    private ?int $backId = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Language
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

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
     * @return Language
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

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
     * @return Language
     */
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @param string|null $locale
     * @return Language
     */
    public function setLocale(?string $locale): self
    {
        $this->locale = $locale;

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
     * @return Language
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDirectory(): ?string
    {
        return $this->directory;
    }

    /**
     * @param string|null $directory
     * @return Language
     */
    public function setDirectory(?string $directory): self
    {
        $this->directory = $directory;

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
     * @return Language
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

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
     * @return Language
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBackId(): ?int
    {
        return $this->backId;
    }

    /**
     * @param int|null $backId
     * @return Language
     */
    public function setBackId(?int $backId): self
    {
        $this->backId = $backId;

        return $this;
    }
}