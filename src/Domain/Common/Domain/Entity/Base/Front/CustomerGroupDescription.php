<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CustomerGroupDescriptionRepository;

#[ORM\Table(name: "`oc_customer_group_description`")]
#[ORM\Entity(repositoryClass: CustomerGroupDescriptionRepository::class)]
class CustomerGroupDescription
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CustomerGroup::class, inversedBy: "descriptions")]
    #[ORM\JoinColumn(name: "`customer_group_id`", referencedColumnName: "`customer_group_id`")]
    private ?CustomerGroup $customerGroup = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Language::class)]
    #[ORM\JoinColumn(name: "`language_id`", referencedColumnName: "`language_id`")]
    private ?Language $language = null;

    #[ORM\Column(name: "`name`", type: Types::STRING, length: 32)]
    private ?string $name = null;

    #[ORM\Column(name: "`description`", type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @return CustomerGroup|null
     */
    public function getCustomerGroup(): ?CustomerGroup
    {
        return $this->customerGroup;
    }

    /**
     * @param CustomerGroup|null $customerGroup
     * @return CustomerGroupDescription
     */
    public function setCustomerGroup(?CustomerGroup $customerGroup): self
    {
        $this->customerGroup = $customerGroup;

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
     * @return CustomerGroupDescription
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
     * @return CustomerGroupDescription
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return CustomerGroupDescription
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}