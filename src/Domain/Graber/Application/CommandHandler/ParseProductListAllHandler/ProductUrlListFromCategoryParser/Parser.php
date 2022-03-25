<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseProductListAllHandler\ProductUrlListFromCategoryParser;

use Symfony\Component\DomCrawler\Crawler;
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
     * @param Crawler $crawler
     * @return string[]
     *
     * @psalm-return list<string>
     */
    private function handle(Crawler $crawler): array
    {
        return $crawler->filter('a.item-title')->each(static fn(Crawler $node) => $node->attr('href'));
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
        for ($i = 1; true; $i++) {
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