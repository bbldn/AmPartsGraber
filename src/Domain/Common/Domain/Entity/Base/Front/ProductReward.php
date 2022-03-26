<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductRewardRepository;

/**
 * @ORM\Table(name="`oc_product_reward`")
 * @ORM\Entity(repositoryClass=ProductRewardRepository::class)
 */
class ProductReward
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="`product_reward_id`")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class)
     * @ORM\JoinColumn(name="`product_id`", referencedColumnName="`product_id`")
     */
    private ?Product $product = null;

    /**
     * @ORM\ManyToOne(targetEntity=CustomerGroup::class)
     * @ORM\JoinColumn(name="`customer_group_id`", referencedColumnName="`customer_group_id`")
     */
    private ?CustomerGroup $customerGroup = null;

    /**
     * @ORM\Column(type="integer", name="`points`", options={"default": 0})
     */
    private ?int $points = 0;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return ProductReward
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     * @return ProductReward
     */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;

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
     * @return ProductReward
     */
    public function setCustomerGroup(?CustomerGroup $customerGroup): self
    {
        $this->customerGroup = $customerGroup;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPoints(): ?int
    {
        return $this->points;
    }

    /**
     * @param int|null $points
     * @return ProductReward
     */
    public function setPoints(?int $points): self
    {
        $this->points = $points;

        return $this;
    }
}