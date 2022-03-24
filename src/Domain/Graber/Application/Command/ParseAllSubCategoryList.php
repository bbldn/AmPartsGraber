<?php

namespace App\Domain\Graber\Application\Command;

use Closure;
use App\Domain\Common\Application\CommandBus\Command;

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