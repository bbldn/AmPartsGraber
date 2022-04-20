<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductRecurringRepository;

#[ORM\Table(name: "`oc_product_recurring`")]
#[ORM\Entity(repositoryClass: ProductRecurringRepository::class)]
class ProductRecurring
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(name: "`product_id`", referencedColumnName: "`product_id`")]
    private ?Product $product = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Recurring::class)]
    #[ORM\JoinColumn(name: "`recurring_id`", referencedColumnName: "`recurring_id`")]
    private ?Recurring $recurring = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: CustomerGroup::class)]
    #[ORM\JoinColumn(name: "`customer_group_id`", referencedColumnName: "`customer_group_id`")]
    private ?CustomerGroup $customerGroup = null;

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     * @return ProductRecurring
     */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Recurring|null
     */
    public function getRecurring(): ?Recurring
    {
        return $this->recurring;
    }

    /**
     * @param Recurring|null $recurring
     * @return ProductRecurring
     */
    public function setRecurring(?Recurring $recurring): self
    {
        $this->recurring = $recurring;

        return $this;
    }

    /**
     * @return CustomerGroup|null
     */
    public function getCustomerGroup(): ?CustomerGroup
    {
        return $this->customerGroup;
    }

    /**
     * @param CustomerGroup|null $customerGroup
     * @return ProductRecurring
     */
    public function setCustomerGroup(?CustomerGroup $customerGroup): self
    {
        $this->customerGroup = $customerGroup;

        return $this;
    }
}