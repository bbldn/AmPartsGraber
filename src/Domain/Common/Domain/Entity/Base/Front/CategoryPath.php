<?php

namespace App\Domain\Common\Domain\Entity\Base\Front;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CategoryPathRepository;

/**
 * @ORM\Table(name="`oc_category_path`")
 * @ORM\Entity(repositoryClass=CategoryPathRepository::class)
 */
class CategoryPath
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Category::class)
     * @ORM\JoinColumn(name="`category_id`", referencedColumnName="`category_id`")
     */
    private ?Category $categoryA = null;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Category::class)
     * @ORM\JoinColumn(name="`path_id`", referencedColumnName="`category_id`")
     */
    private ?Category $categoryB = null;

    /**
     * @ORM\Column(type="integer", name="`level`")
     */
    private ?int $level = null;

    /**
     * @return Category|null
     */
    public function getCategoryA(): ?Category
    {
        return $this->categoryA;
    }

    /**
     * @param Category|null $categoryA
     * @return CategoryPath
     */
    public function setCategoryA(?Category $categoryA): self
    {
        $this->categoryA = $categoryA;

        return $this;
    }

    /**
     * @return Category|null
     */
    public function getCategoryB(): ?Category
    {
        return $this->categoryB;
    }

    /**
     * @param Category|null $categoryB
     * @return CategoryPath
     */
    public function setCategoryB(?Category $categoryB): self
    {
        $this->categoryB = $categoryB;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getLevel(): ?int
    {
        return $this->level;
    }

    /**
     * @param int|null $level
     * @return CategoryPath
     */
    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }
}