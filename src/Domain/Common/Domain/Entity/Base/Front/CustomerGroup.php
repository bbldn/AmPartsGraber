<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CustomerGroupRepository;

/**
 * @ORM\Entity(repositoryClass=CustomerGroupRepository::class)
 * @ORM\Table(name="`oc_customer_group`", indexes={@ORM\Index(name="back_id_idx", columns={"back_id"})})
 */
class CustomerGroup
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`customer_group_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="boolean", name="`approval`")
     */
    private ?bool $approval = null;

    /**
     * @ORM\Column(type="integer", name="`sort_order`")
     */
    private ?int $sortOrder = null;

    /**
     * @var Collection|CustomerGroupDescription[]
     * @ORM\OneToMany(
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true,
     *     mappedBy="customerGroup",
     *     cascade={"persist", "remove"},
     *     targetEntity=CustomerGroupDescription::class
     * )
     *
     * @psalm-var Collection<int, CustomerGroupDescription>
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
     * @param bool $approval
     * @return CustomerGroup
     */
    public function setApproval(bool $approval): self
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
     * @param int $sortOrder
     * @return CustomerGroup
     */
    public function setSortOrder(int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return CustomerGroupDescription[]|Collection
     *
     * @psalm-return Collection<int, CustomerGroupDescription>
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }
}