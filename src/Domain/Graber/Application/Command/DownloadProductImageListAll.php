<?php

namespace App\Domain\Graber\Application\Command;

use Closure;
use BBLDN\CQRS\CommandBus\Command;
use BBLDN\CQRSBundle\CommandBus\Annotation as CQRS;
use App\Domain\Graber\Application\CommandHandler\DownloadProductImageListAllHandler\CommandHandler;

#[CQRS\CommandHandler(class: CommandHandler::class)]
class DownloadProductImageListAll implements Command
{
    /**
     * @psalm-var null|Closure(int):void
     */
    private ?Closure $onStart = null;

    /**
     * @psalm-var null|Closure(int):void
     */
    private ?Closure $onSetProgress = null;

    /**
     * @return Closure|null
     *
     * @psalm-return null|Closure(int):void
     */
    public function getOnStart(): ?Closure
    {
        return $this->onStart;
    }

    /**
     * @param Closure|null $onStart
     * @return DownloadProductImageListAll
     *
     * @psalm-param null|Closure(int):void $onStart
     */
    public function setOnStart(?Closure $onStart): self
    {
        $this->onStart = $onStart;

        return $this;
    }

    /**
     * @return Closure|null
     *
     * @psalm-return null|Closure(int):void
     */
    public function getOnSetProgress(): ?Closure
    {
        return $this->onSetProgress;
    }

    /**
     * @param Closure|null $onSetProgress
     * @return DownloadProductImageListAll
     *
     * @psalm-param null|Closure(int):void $onSetProgress
     */
    public function setOnSetProgress(?Closure $onSetProgress): self
    {
        $this->onSetProgress = $onSetProgress;

        return $this;
    }
}