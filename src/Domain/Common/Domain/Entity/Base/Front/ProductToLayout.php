<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductToLayoutRepository;

/**
 * @ORM\Table(name="`oc_product_to_layout`")
 * @ORM\Entity(repositoryClass=ProductToLayoutRepository::class)
 */
class ProductToLayout
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Product::class)
     * @ORM\JoinColumn(name="`product_id`", referencedColumnName="`product_id`")
     */
    private ?Product $product = null;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Shop::class)
     * @ORM\JoinColumn(name="`store_id`", referencedColumnName="`store_id`")
     */
    private ?Shop $shop = null;

    /**
     * @ORM\ManyToOne(targetEntity=Layout::class)
     * @ORM\JoinColumn(name="`layout_id`", referencedColumnName="`layout_id`")
     */
    private ?Layout $layout = null;

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     * @return ProductToLayout
     */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Shop|null
     */
    public function getShop(): ?Shop
    {
        return $this->shop;
    }

    /**
     * @param Shop|null $shop
     * @return ProductToLayout
     */
    public function setShop(?Shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * @return Layout|null
     */
    public function getLayout(): ?Layout
    {
        return $this->layout;
    }

    /**
     * @param Layout|null $layout
     * @return ProductToLayout
     */
    public function setLayout(?Layout $layout): self
    {
        $this->layout = $layout;

        return $this;
    }
}