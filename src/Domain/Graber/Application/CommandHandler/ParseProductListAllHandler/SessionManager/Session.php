<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\SessionManager;

class Session
{
    private int $productIndex = 0;

    private int $categoryIndex = 0;

    /**
     * @return int
     */
    public function getProductIndex(): int
    {
        return $this->productIndex;
    }

    /**
     * @param int $productIndex
     * @return Session
     */
    public function setProductIndex(int $productIndex): self
    {
        $this->productIndex = $productIndex;

        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryIndex(): int
    {
        return $this->categoryIndex;
    }

    /**
     * @param int $categoryIndex
     * @return Session
     */
    public function setCategoryIndex(int $categoryIndex): self
    {
        $this->categoryIndex = $categoryIndex;

        return $this;
    }
}