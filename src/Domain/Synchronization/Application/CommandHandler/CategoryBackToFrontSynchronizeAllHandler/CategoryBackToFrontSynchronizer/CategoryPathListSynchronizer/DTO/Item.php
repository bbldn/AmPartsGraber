<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryPathListSynchronizer\DTO;

use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;

class Item
{
    private int $level;

    private CategoryFront $categoryA;

    private CategoryFront $categoryB;

    /**
     * @param int $level
     * @param CategoryFront $categoryA
     * @param CategoryFront $categoryB
     */
    public function __construct(
        int $level,
        CategoryFront $categoryA,
        CategoryFront $categoryB
    )
    {
        $this->level = $level;
        $this->categoryA = $categoryA;
        $this->categoryB = $categoryB;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     * @return Item
     */
    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return CategoryFront
     */
    public function getCategoryA(): CategoryFront
    {
        return $this->categoryA;
    }

    /**
     * @param CategoryFront $categoryA
     * @return Item
     */
    public function setCategoryA(CategoryFront $categoryA): self
    {
        $this->categoryA = $categoryA;

        return $this;
    }

    /**
     * @return CategoryFront
     */
    public function getCategoryB(): CategoryFront
    {
        return $this->categoryB;
    }

    /**
     * @param CategoryFront $categoryB
     * @return Item
     */
    public function setCategoryB(CategoryFront $categoryB): self
    {
        $this->categoryB = $categoryB;

        return $this;
    }
}