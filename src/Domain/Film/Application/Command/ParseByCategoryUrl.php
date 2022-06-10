<?php

namespace App\Domain\Film\Application\Command;

use BBLDN\CQRS\CommandBus\Command;
use BBLDN\CQRSBundle\CommandBus\Annotation as CQRS;
use App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\Handler;

#[CQRS\CommandHandler(class: Handler::class)]
class ParseByCategoryUrl implements Command
{
    private string $url;

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}