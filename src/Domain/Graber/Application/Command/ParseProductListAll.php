<?php

namespace App\Domain\Graber\Application\Command;

use Closure;
use App\Domain\Common\Application\CommandBus\Command;

class ParseProductListAll implements Command
{
    /**
     * @psalm-var null|Closure(int):void
     */
    private ?Closure $onStartProduct = null;

    /**
     * @psalm-var null|Closure(int):void
     */
    private ?Closure $onStartCategory = null;

    /**
     * @psalm-var null|Closure(int):void
     */
    private ?Closure $onSetProductProgress = null;

    /**
     * @psalm-var null|Closure(int):void
     */
    private ?Closure $onSetCategoryProgress = null;

    /**
     * @return Closure|null
     *
     * @psalm-return null|Closure(int):void
     */
    public function getOnStartProduct(): ?Closure
    {
        return $this->onStartProduct;
    }

    /**
     * @param Closure|null $onStartProduct
     * @return ParseProductListAll
     *
     * @psalm-param null|Closure(int):void $onStartProduct
     */
    public function setOnStartProduct(?Closure $onStartProduct): self
    {
        $this->onStartProduct = $onStartProduct;

        return $this;
    }

    /**
     * @return Closure|null
     *
     * @psalm-return null|Closure(int):void
     */
    public function getOnStartCategory(): ?Closure
    {
        return $this->onStartCategory;
    }

    /**
     * @param Closure|null $onStartCategory
     * @return ParseProductListAll
     *
     * @psalm-param null|Closure(int):void $onStartCategory
     */
    public function setOnStartCategory(?Closure $onStartCategory): self
    {
        $this->onStartCategory = $onStartCategory;

        return $this;
    }

    /**
     * @return Closure|null
     *
     * @psalm-return null|Closure(int):void
     */
    public function getOnSetProductProgress(): ?Closure
    {
        return $this->onSetProductProgress;
    }

    /**
     * @param Closure|null $onSetProductProgress
     * @return ParseProductListAll
     *
     * @psalm-param null|Closure(int):void $onSetProductProgress
     */
    public function setOnSetProductProgress(?Closure $onSetProductProgress): self
    {
        $this->onSetProductProgress = $onSetProductProgress;

        return $this;
    }

    /**
     * @return Closure|null
     *
     * @psalm-return null|Closure(int):void
     */
    public function getOnSetCategoryProgress(): ?Closure
    {
        return $this->onSetCategoryProgress;
    }

    /**
     * @param Closure|null $onSetCategoryProgress
     * @return ParseProductListAll
     *
     * @psalm-param null|Closure(int):void $onSetCategoryProgress
     */
    public function setOnSetCategoryProgress(?Closure $onSetCategoryProgress): self
    {
        $this->onSetCategoryProgress = $onSetCategoryProgress;

        return $this;
    }
}