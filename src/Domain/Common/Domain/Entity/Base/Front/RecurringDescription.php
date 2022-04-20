<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\RecurringDescriptionRepository;

#[ORM\Table(name: "`oc_recurring_description`")]
#[ORM\Entity(repositoryClass: RecurringDescriptionRepository::class)]
class RecurringDescription
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Recurring::class, inversedBy: "descriptions")]
    #[ORM\JoinColumn(name: "`recurring_id`", referencedColumnName: "`recurring_id`")]
    private ?Recurring $recurring = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Language::class)]
    #[ORM\JoinColumn(name: "`language_id`", referencedColumnName: "`language_id`")]
    private ?Language $language = null;

    #[ORM\Column(name: "`name`", type: Types::STRING, length: 255)]
    private ?string $name = null;

    /**
     * @return Recurring|null
     */
    public function getRecurring(): ?Recurring
    {
        return $this->recurring;
    }

    /**
     * @param Recurring|null $recurring
     * @return RecurringDescription
     */
    public function setRecurring(?Recurring $recurring): self
    {
        $this->recurring = $recurring;

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
     * @return RecurringDescription
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
     * @return RecurringDescription
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}