<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductRelatedRepository;

/**
 * @ORM\Table(name="`oc_product_related`")
 * @ORM\Entity(repositoryClass=ProductRelatedRepository::class)
 */
class ProductRelated
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Product::class)
     * @ORM\JoinColumn(name="`product_id`", referencedColumnName="`product_id`")
     */
    private ?Product $productA = null;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Product::class)
     * @ORM\JoinColumn(name="`related_id`", referencedColumnName="`related_id`")
     */
    private ?Product $productB = null;

    /**
     * @return Product|null
     */
    public function getProductA(): ?Product
    {
        return $this->productA;
    }

    /**
     * @param Product|null $productA
     * @return ProductRelated
     */
    public function setProductA(?Product $productA): self
    {
        $this->productA = $productA;

        return $this;
    }

    /**
     * @return Product|null
     */
    public function getProductB(): ?Product
    {
        return $this->productB;
    }

    /**
     * @param Product|null $productB
     * @return ProductRelated
     */
    public function setProductB(?Product $productB): self
    {
        $this->productB = $productB;

        return $this;
    }
}