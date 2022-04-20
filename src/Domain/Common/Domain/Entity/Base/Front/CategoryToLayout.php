<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CategoryToLayoutRepository;

#[ORM\Table(name: "`oc_category_to_layout`")]
#[ORM\Entity(repositoryClass: CategoryToLayoutRepository::class)]
class CategoryToLayout
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Category::class)]
    #[ORM\JoinColumn(name: "`category_id`", referencedColumnName: "`category_id`")]
    private ?Category $category = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Shop::class)]
    #[ORM\JoinColumn(name: "`store_id`", referencedColumnName: "`store_id`")]
    private ?Shop $shop = null;

    #[ORM\ManyToOne(targetEntity: Layout::class)]
    #[ORM\JoinColumn(name: "`layout_id`", referencedColumnName: "`layout_id`")]
    private ?Layout $layout = null;

    /**
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category|null $category
     * @return CategoryToLayout
     */
    public function setCategory(?Category $category): self
    {
        $this->category = $category;

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
     * @return CategoryToLayout
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
     * @return CategoryToLayout
     */
    public function setLayout(?Layout $layout): self
    {
        $this->layout = $layout;

        return $this;
    }
}