<?php

namespace App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler;

use App\Domain\Film\Application\Command\ParseByCategoryUrl;
use Doctrine\ORM\EntityManagerInterface as EntityManagerFilm;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\Client\Client as Client;
use App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\ActressSaver\Saver as ActressSaver;
use App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\ActressParser\Parser as ActressParser;
use App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\CategoryParser\Parser as CategoryParser;

class Handler
{
    private Client $client;

    private ActressSaver $actressSaver;

    private ActressParser $actressParser;

    private CategoryParser $categoryParser;
    
    private EntityManagerFilm $entityManagerFilm;

    /**
     * @param Client $client
     * @param ActressSaver $actressSaver
     * @param ActressParser $actressParser
     * @param CategoryParser $categoryParser
     * @param EntityManagerFilm $entityManagerFilm
     */
    public function __construct(
        Client $client,
        ActressSaver $actressSaver,
        ActressParser $actressParser,
        CategoryParser $categoryParser,
        EntityManagerFilm $entityManagerFilm
    )
    {
        $this->client = $client;
        $this->actressSaver = $actressSaver;
        $this->actressParser = $actressParser;
        $this->categoryParser = $categoryParser;
        $this->entityManagerFilm = $entityManagerFilm;
    }

    /**
     * @param ParseByCategoryUrl $command
     * @return void
     * @throws ClientExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws RedirectionExceptionInterface
     */
    public function __invoke(ParseByCategoryUrl $command): void
    {
        for ($i = 0; ;$i++) {
            $url = "{$command->getUrl()}?page=$i";
            $html = $this->client->get($url);
            $categoryDTO = $this->categoryParser->parse($html);
            $urlList = $categoryDTO->getUrlList();
            if (0 === count($urlList)) {
                break;
            }

            foreach ($urlList as $url) {
                $html = $this->client->get($url);
                $actress = $this->actressParser->parse($html);
                $this->actressSaver->save($actress);
            }

            $this->entityManagerFilm->flush();
            $this->entityManagerFilm->clear();
        }
    }
}