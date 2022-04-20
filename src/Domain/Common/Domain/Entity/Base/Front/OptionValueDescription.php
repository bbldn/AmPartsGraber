<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OptionValueDescriptionRepository;

#[ORM\Table(name: "`oc_option_value_description`")]
#[ORM\Entity(repositoryClass: OptionValueDescriptionRepository::class)]
class OptionValueDescription
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: OptionValue::class)]
    #[ORM\JoinColumn(name: "`option_value_id`", referencedColumnName: "`option_value_id`")]
    private ?OptionValue $optionValue = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Language::class)]
    #[ORM\JoinColumn(name: "`language_id`", referencedColumnName: "`language_id`")]
    private ?Language $language = null;

    #[ORM\ManyToOne(targetEntity: Option::class)]
    #[ORM\JoinColumn(name: "`option_id`", referencedColumnName: "`option_id`", nullable: true)]
    private ?Option $option = null;

    #[ORM\Column(name: "`name`", type: Types::STRING, length: 128)]
    private ?string $name = null;

    /**
     * @return OptionValue|null
     */
    public function getOptionValue(): ?OptionValue
    {
        return $this->optionValue;
    }

    /**
     * @param OptionValue|null $optionValue
     * @return OptionValueDescription
     */
    public function setOptionValue(?OptionValue $optionValue): self
    {
        $this->optionValue = $optionValue;

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
     * @return OptionValueDescription
     */
    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return Option|null
     */
    public function getOption(): ?Option
    {
        return $this->option;
    }

    /**
     * @param Option|null $option
     * @return OptionValueDescription
     */
    public function setOption(?Option $option): self
    {
        $this->option = $option;

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
     * @return OptionValueDescription
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}