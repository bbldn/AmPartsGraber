<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductUrlListFromCategoryParser;

use Symfony\Component\DomCrawler\Crawler;
use App\Domain\Graber\Domain\Exception\ParseException;

class Parser
{
    /**
     * @param string $url
     * @return string
     * @throws ParseException
     */
    private function getHTML(string $url): string
    {
        $html = @file_get_contents("https://am-parts.ru$url");
        if (false === $html) {
            throw new ParseException('Error');
        }

        return $html;
    }

    /**
     * @param Crawler $crawler
     * @return string[]
     *
     * @psalm-return list<string>
     */
    private function handle(Crawler $crawler): array
    {
        return $crawler->filter('a.item-title')->each(static fn(Crawler $node): string => (string)$node->attr('href'));
    }

    /**
     * @param Crawler $crawler
     * @return bool
     */
    private function isEnd(Crawler $crawler): bool
    {
        return 0 === $crawler->filter('li.last')->count();
    }

    /**
     * @param string $url
     * @return string[]
     * @throws ParseException
     *
     * @psalm-return list<string>
     */
    public function parse(string $url): array
    {
        $urlMap = [];
        for ($i = 1; ; $i++) {
            $html = $this->getHTML("$url?PAGEN_1=$i");
            $crawler = new Crawler($html);

            $newUrlList = $this->handle($crawler);
            foreach ($newUrlList as $newUrl) {
                $urlMap[$newUrl] = true;
            }

            if (true === $this->isEnd($crawler)) {
                break;
            }
        }

        return array_keys($urlMap);
    }
}