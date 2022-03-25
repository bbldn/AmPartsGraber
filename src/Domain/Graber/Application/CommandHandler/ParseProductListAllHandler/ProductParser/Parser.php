<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductParser;

use App\Domain\Graber\Domain\DTO\Product;
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
     * @param Product $product
     * @param Crawler $crawler
     * @return void
     */
    private function parseCode(Product $product, Crawler $crawler): void
    {
        $node = $crawler->filter('.catalog-detail-article .article')->first();
        if (null === $node) {
            return;
        }

        $tmp = explode(' ', trim($node->innerText()));
        $product->setCode((string)$tmp[count($tmp) - 1]);
    }

    /**
     * @param Product $product
     * @param Crawler $crawler
     * @return void
     */
    private function parseName(Product $product, Crawler $crawler): void
    {
        $node = $crawler->filter('#pagetitle')->first();
        if (null === $node) {
            return;
        }

        $product->setName($node->innerText());
    }

    /**
     * @param Product $product
     * @param Crawler $crawler
     * @return void
     */
    private function parsePrice(Product $product, Crawler $crawler): void
    {
        $node = $crawler->filter('.catalog-detail-price meta[itemprop=price]')->first();
        if (null === $node) {
            return;
        }

        $price = $node->attr('content');
        if (false === is_numeric($price)) {
            return;
        }

        $product->setPrice((float)$price);
    }

    /**
     * @param Product $product
     * @param Crawler $crawler
     * @return void
     */
    private function parseImageUrl(Product $product, Crawler $crawler): void
    {
        $node = $crawler->filter('.detail_picture meta[itemprop=image]')->first();
        if (null === $node) {
            return;
        }

        $imageUrl = $node->attr('content');
        if (0 === mb_strlen($imageUrl)) {
            $imageUrl = null;
        }

        $product->setImageUrl($imageUrl);
    }

    /**
     * @param Product $product
     * @param Crawler $crawler
     * @return void
     */
    private function parseDescription(Product $product, Crawler $crawler): void
    {
        $node = $crawler->filter('.tabs__box')->first();
        if (null === $node) {
            return;
        }

        $product->setDescription($node->html());
    }

    /**
     * @param Product $product
     * @param Crawler $crawler
     * @return void
     */
    private function parseCategoryUrl(Product $product, Crawler $crawler): void
    {
        $node = $crawler->filter('.breadcrumb__item:last-child a')->first();
        if (null === $node) {
            return;
        }

        $product->setCategoryUrl($node->attr('href'));
    }

    /**
     * @param string $url
     * @return Product|null
     * @throws ParseException
     */
    public function parser(string $url): ?Product
    {
        $html = $this->getHTML($url);
        $crawler = new Crawler($html);

        $product = new Product();

        $this->parseName($product, $crawler);
        if (null === $product->getName()) {
            return null;
        }

        $this->parseCode($product, $crawler);
        $this->parsePrice($product, $crawler);
        $this->parseImageUrl($product, $crawler);
        $this->parseCategoryUrl($product, $crawler);
        $this->parseDescription($product, $crawler);

        return $product->setUrl($url);
    }
}