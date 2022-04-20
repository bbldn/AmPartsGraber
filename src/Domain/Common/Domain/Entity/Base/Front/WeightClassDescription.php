<?php


namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\WeightClassDescriptionRepository;

#[ORM\Table(name: "`oc_weight_class_description`")]
#[ORM\Entity(repositoryClass: WeightClassDescriptionRepository::class)]
class WeightClassDescription
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: WeightClass::class, inversedBy: "descriptions")]
    #[ORM\JoinColumn(name: "`weight_class_id`", referencedColumnName: "`weight_class_id`")]
    private ?WeightClass $weightClass = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Language::class)]
    #[ORM\JoinColumn(name: "`language_id`", referencedColumnName: "`language_id`")]
    private ?Language $language = null;

    #[ORM\Column(name: "`title`", type: Types::STRING, length: 32)]
    private ?string $title = null;

    #[ORM\Column(name: "`unit`", type: Types::STRING, length: 4)]
    private ?string $unit = null;

    /**
     * @return WeightClass|null
     */
    public function getWeightClass(): ?WeightClass
    {
        return $this->weightClass;
    }

    /**
     * @param WeightClass|null $weightClass
     * @return WeightClassDescription
     */
    public function setWeightClass(?WeightClass $weightClass): self
    {
        $this->weightClass = $weightClass;

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
     * @return WeightClassDescription
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
     * @return WeightClassDescription
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
     * @return WeightClassDescription
     */
    public function setUnit(?string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }
}