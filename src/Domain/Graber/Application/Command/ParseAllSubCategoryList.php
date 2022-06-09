<?php

namespace App\Domain\Graber\Application\Command;

use Closure;
use BBLDN\CQRS\CommandBus\Command;
use BBLDN\CQRSBundle\CommandBus\Annotation as CQRS;
use App\Domain\Graber\Application\CommandHandler\ParseAllSubCategoryListHandler\CommandHandler;

#[CQRS\CommandHandler(class: CommandHandler::class)]
class ParseAllSubCategoryList implements Command
{
    private string $url;

    private ?Closure $onParsedCategory;

    /**
     * @param string $url
     * @param Closure|null $onParsedCategory
     */
    public function __construct(string $url, ?Closure $onParsedCategory = null)
    {
        $this->url = $url;
        $this->onParsedCategory = $onParsedCategory;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return Closure|null
     */
    public function getOnParsedCategory(): ?Closure
    {
        return $this->onParsedCategory;
    }
}