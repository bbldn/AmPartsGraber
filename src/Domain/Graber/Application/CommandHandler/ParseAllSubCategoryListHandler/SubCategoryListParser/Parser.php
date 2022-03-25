<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseAllSubCategoryListHandler\SubCategoryListParser;

use Symfony\Component\DomCrawler\Crawler;
use App\Domain\Graber\Domain\DTO\Category;
use Symfony\Component\HttpFoundation\Response;
use App\Domain\Graber\Domain\Exception\ParseException;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface as HttpClient;

class Parser
{
    private HttpClient $httpClient;

    /**
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $url
     * @return string
     * @throws ParseException
     */
    private function getHTML(string $url): string
    {
        try {
            $response = $this->httpClient->request('GET', "https://am-parts.ru$url");

            $code = $response->getStatusCode();
            if (Response::HTTP_OK !== $code) {
                throw new ParseException("Status code: $code");
            }

            $html = $response->getContent();
        } catch (ExceptionInterface $e) {
            throw new ParseException("HttpClientException: {$e->getMessage()}");
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