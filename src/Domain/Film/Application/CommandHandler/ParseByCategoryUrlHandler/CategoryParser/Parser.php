<?php

namespace App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\CategoryParser;

use Symfony\Component\DomCrawler\Crawler;
use App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\DTO\Category as CategoryDTO;

class Parser
{
    /**
     * @param string $html
     * @return CategoryDTO
     */
    public function parse(string $html): CategoryDTO
    {
        $urlList = [];

        $crawler = new Crawler($html);
        $crawler->filter('div.actress-list div.actress')->each(function (Crawler $c) use(&$urlList): void {
            $c = $c->filter('a');
            if ($c->count() > 0) {
                $href = (string)$c->first()->attr('href');
                if (mb_strlen($href) > 0) {
                    $urlList[] = $href;
                }
            }
        });

        return new CategoryDTO($urlList);
    }
}