<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CustomerGroupRepository;

#[ORM\Table(name: "`oc_customer_group`")]
#[ORM\Index(name: "back_id_idx", columns: ["back_id"])]
#[ORM\Entity(repositoryClass: CustomerGroupRepository::class)]
class CustomerGroup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`customer_group_id`", type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: "`approval`", type: Types::BOOLEAN)]
    private ?bool $approval = null;

    #[ORM\Column(name: "`sort_order`", type: Types::INTEGER)]
    private ?int $sortOrder = null;

    #[ORM\Column(name: "`back_id`", type: Types::INTEGER, nullable: true)]
    private ?int $backId = null;

    /** @var Collection<int, CustomerGroupDescription> */
    #[ORM\OneToMany(
        fetch: "EXTRA_LAZY",
        orphanRemoval: true,
        mappedBy: "customerGroup",
        cascade: ["persist", "remove"],
        targetEntity: CustomerGroupDescription::class
    )]
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
     * @return CustomerGroup
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getApproval(): ?bool
    {
        return $this->approval;
    }

    /**
     * @param bool|null $approval
     * @return CustomerGroup
     */
    public function setApproval(?bool $approval): self
    {
        $this->approval = $approval;

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
     * @return CustomerGroup
     */
    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

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
     * @return CustomerGroup
     */
    public function setBackId(?int $backId): self
    {
        $this->backId = $backId;

        return $this;
    }

    /**
     * @return Collection<int, CustomerGroupDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}