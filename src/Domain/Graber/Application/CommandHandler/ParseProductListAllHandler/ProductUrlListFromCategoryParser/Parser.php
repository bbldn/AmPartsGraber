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
     * @param string $html
     * @return string[]
     *
     * @psalm-return list<string>
     */
    private function handle(string $html): array
    {
        $crawler = new Crawler($html);

        return $crawler->filter('a.item-title')->each(static fn(Crawler $node) => $node->attr('href'));
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
        $urlList = [];
        for ($i = 1; ; $i++) {
            $html = $this->getHTML("$url?PAGEN_1=$i");
            $newUrlList = $this->handle($html);
            if (0 === count($newUrlList)) {
                break;
            }

            foreach ($newUrlList as $url) {
                $urlList[] = $url;
            }
        }

        return $urlList;
    }
}