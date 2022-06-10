<?php

namespace App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\DTO;

class Category
{
    /**
     * @var string[]
     *
     * @psalm-var list<string>
     */
    private array $urlList;

    /**
     * @param string[] $urlList
     *
     * @psalm-param list<string> $urlList
     */
    public function __construct(?array $urlList)
    {
        $this->urlList = $urlList;
    }

    /**
     * @return string[]
     *
     * @psalm-return list<string>
     */
    public function getUrlList(): ?array
    {
        return $this->urlList;
    }
}