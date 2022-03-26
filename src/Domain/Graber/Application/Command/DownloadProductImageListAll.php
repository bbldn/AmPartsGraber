<?php

namespace App\Domain\Graber\Application\Command;

use Closure;
use App\Domain\Common\Application\CommandBus\Command;

class DownloadProductImageListAll implements Command
{
    /**
     * @psalm-var Closure(int):void
     */
    private ?Closure $onStart = null;

    /**
     * @psalm-var Closure(int):void
     */
    private ?Closure $onSetProgress = null;

    /**
     * @return Closure|null
     */
    public function getOnStart(): ?Closure
    {
        return $this->onStart;
    }

    /**
     * @param Closure|null $onStart
     * @return DownloadProductImageListAll
     */
    public function setOnStart(?Closure $onStart): self
    {
        $this->onStart = $onStart;

        return $this;
    }

    /**
     * @return Closure|null
     */
    public function getOnSetProgress(): ?Closure
    {
        return $this->onSetProgress;
    }

    /**
     * @param Closure|null $onSetProgress
     * @return DownloadProductImageListAll
     */
    public function setOnSetProgress(?Closure $onSetProgress): self
    {
        $this->onSetProgress = $onSetProgress;

        return $this;
    }
}