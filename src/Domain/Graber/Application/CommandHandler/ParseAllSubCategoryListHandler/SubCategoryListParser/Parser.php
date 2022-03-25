<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseAllSubCategoryListHandler\SubCategoryListParser;

use Symfony\Component\DomCrawler\Crawler;
use App\Domain\Graber\Domain\DTO\Category;
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
     * @param string $url
     * @return Category[]
     * @throws ParseException
     *
     * @psalm-return list<Category>
     */
    public function parse(string $url): array
    {
        $html = $this->getHTML($url);

        $selector = '#catalog-section-list .catalog-section .catalog-section-childs .catalog-section-child a';
        $callback = static function (Crawler $node): ?Category {
            $title = $node->attr('title');
            if (null === $title) {
                return null;
            }

            $category = new Category();
            $category->setName($title);
            $category->setUrl($node->attr('href'));

            return $category;
        };

        $crawler = new Crawler($html);
        $categoryList = $crawler->filter($selector)->each($callback);

        return array_filter($categoryList, static fn(?Category $category) => null !== $category);
    }
}