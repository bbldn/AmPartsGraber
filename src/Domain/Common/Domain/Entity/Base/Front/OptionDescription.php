<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\OptionDescriptionRepository;

/**
 * @ORM\Table(name="`oc_option_description`")
 * @ORM\Entity(repositoryClass=OptionDescriptionRepository::class)
 */
class OptionDescription
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Option::class)
     * @ORM\JoinColumn(name="`option_id`", referencedColumnName="`option_id`")
     */
    private ?Option $option = null;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Language::class)
     * @ORM\JoinColumn(name="`language_id`", referencedColumnName="`language_id`")
     */
    private ?Language $language = null;

    /**
     * @ORM\Column(type="string", name="`name`", length=128)
     */
    private ?string $name = null;

    /**
     * @return Option|null
     */
    public function getOption(): ?Option
    {
        return $this->option;
    }

    /**
     * @param Option|null $option
     * @return OptionDescription
     */
    public function setOption(?Option $option): self
    {
        $this->option = $option;

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
     * @return OptionDescription
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
     * @return OptionDescription
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}