<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\ProductCategoryRepository;

#[ORM\Table(name: "`oc_product_to_category`")]
#[ORM\Entity(repositoryClass: ProductCategoryRepository::class)]
class ProductCategory
{
    #[ORM\Id]
    #[ORM\JoinColumn(name: "`product_id`", referencedColumnName: "`product_id`")]
    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: "productToCategories")]
    private ?Product $product = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: "descriptions")]
    #[ORM\JoinColumn(name: "`category_id`", referencedColumnName: "`category_id`")]
    private ?Category $category = null;

    #[ORM\Column(name: "`main_category`", type: Types::BOOLEAN, options: ["default" => 0])]
    private ?bool $default = false;

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     * @return ProductCategory
     */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category|null $category
     * @return ProductCategory
     */
    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDefault(): ?bool
    {
        return $this->default;
    }

    /**
     * @param bool|null $default
     * @return ProductCategory
     */
    public function setDefault(?bool $default): self
    {
        $this->default = $default;

        return $this;
    }
}
