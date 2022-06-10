<?php

namespace App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\Client;

use Campo\UserAgent;
use Symfony\Contracts\HttpClient\HttpClientInterface as HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;

class Client
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
     * @throws ClientExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws RedirectionExceptionInterface
     */
    public function get(string $url): string
    {
        $userAgent = UserAgent::random([
            'device_type' => 'Desktop',
            'os_type' => ['Linux', 'Windows', 'OS X'],
        ]);

        return $this->httpClient->request('GET', "https://actress-base.ru$url", ['headers' => ['User-Agent' => $userAgent]])->getContent();
    }
}