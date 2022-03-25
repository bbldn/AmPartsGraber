<?php

namespace App\Domain\Graber\Application\Command;

use Closure;
use App\Domain\Common\Application\CommandBus\Command;

class ParseProductListAll implements Command
{
    /**
     * @psalm-var Closure():void
     */
    private ?Closure $onHandledProduct = null;

    /**
     * @psalm-var Closure():void
     */
    private ?Closure $onHandledCategory = null;

    /**
     * @psalm-var Closure(int):void
     */
    private ?Closure $onReceivedProductList = null;

    /**
     * @psalm-var Closure(int):void
     */
    private ?Closure $onReceivedCategoryList = null;

    /**
     * @return Closure|null
     *
     * @psalm-return null|Closure():void
     */
    public function getOnHandledProduct(): ?Closure
    {
        return $this->onHandledProduct;
    }

    /**
     * @param Closure|null $onHandledProduct
     * @return ParseProductListAll
     *
     * @psalm-param null|Closure():void $onHandledProduct
     */
    public function setOnHandledProduct(?Closure $onHandledProduct): self
    {
        $this->onHandledProduct = $onHandledProduct;

        return $this;
    }

    /**
     * @return Closure|null
     *
     * @psalm-return null|Closure():void
     */
    public function getOnHandledCategory(): ?Closure
    {
        return $this->onHandledCategory;
    }

    /**
     * @param Closure|null $onHandledCategory
     * @return ParseProductListAll
     *
     * @psalm-param null|Closure():void $onHandledCategory
     */
    public function setOnHandledCategory(?Closure $onHandledCategory): self
    {
        $this->onHandledCategory = $onHandledCategory;

        return $this;
    }

    /**
     * @return Closure|null
     *
     * @psalm-return null|Closure(int):void
     */
    public function getOnReceivedProductList(): ?Closure
    {
        return $this->onReceivedProductList;
    }

    /**
     * @param Closure|null $onReceivedProductList
     * @return ParseProductListAll
     *
     * @psalm-param null|Closure(int):void $onReceivedProductList
     */
    public function setOnReceivedProductList(?Closure $onReceivedProductList): self
    {
        $this->onReceivedProductList = $onReceivedProductList;

        return $this;
    }

    /**
     * @return Closure|null
     *
     * @psalm-return null|Closure(int):void
     */
    public function getOnReceivedCategoryList(): ?Closure
    {
        return $this->onReceivedCategoryList;
    }

    /**
     * @param Closure|null $onReceivedCategoryList
     * @return ParseProductListAll
     *
     * @psalm-param null|Closure(int):void $onReceivedCategoryList
     */
    public function setOnReceivedCategoryList(?Closure $onReceivedCategoryList): self
    {
        $this->onReceivedCategoryList = $onReceivedCategoryList;

        return $this;
    }
}