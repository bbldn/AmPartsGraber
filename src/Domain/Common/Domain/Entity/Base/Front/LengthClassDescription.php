<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\LengthClassDescriptionRepository;

#[ORM\Table(name: "`oc_length_class_description`")]
#[ORM\Entity(repositoryClass: LengthClassDescriptionRepository::class)]
class LengthClassDescription
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: LengthClass::class, inversedBy: "descriptions")]
    #[ORM\JoinColumn(name: "`length_class_id`", referencedColumnName: "`length_class_id`")]
    private ?LengthClass $lengthClass = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Language::class)]
    #[ORM\JoinColumn(name: "`language_id`", referencedColumnName: "`language_id`")]
    private ?Language $language = null;

    #[ORM\Column(name: "`title`", type: Types::STRING, length: 32)]
    private ?string $title = null;

    #[ORM\Column(name: "`unit`", type: Types::STRING, length: 4)]
    private ?string $unit = null;

    /**
     * @return LengthClass|null
     */
    public function getLengthClass(): ?LengthClass
    {
        return $this->lengthClass;
    }

    /**
     * @param LengthClass|null $lengthClass
     * @return LengthClassDescription
     */
    public function setLengthClass(?LengthClass $lengthClass): self
    {
        $this->lengthClass = $lengthClass;

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
     * @return LengthClassDescription
     */
    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return LengthClassDescription
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }

    /**
     * @param string|null $unit
     * @return LengthClassDescription
     */
    public function setUnit(?string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }
}