<?php

namespace App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\ActressParser;

use DateTimeImmutable;
use Symfony\Component\DomCrawler\Crawler;
use App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\DTO\Actress as ActressDTO;

class Parser
{
    /**
     * @param Crawler $crawler
     * @param ActressDTO $actressDTO
     * @return void
     */
    private function parseName(Crawler $crawler, ActressDTO $actressDTO): void
    {
        $crawler = $crawler->filter('h1.profile-name');
        if ($crawler->count() > 0) {
            $actressDTO->setFullName(trim($crawler->text()));
        }
    }

    /**
     * @param Crawler $crawler
     * @param ActressDTO $actressDTO
     * @return void
     */
    private function parseOther(Crawler $crawler, ActressDTO $actressDTO): void
    {
        $crawler->filter('table.block-table')->each(function (Crawler $nodeCrawler) use($actressDTO): void {
            $nodeCrawler->children()->each(function (Crawler $c) use($actressDTO): void {
                $children = $c->children();
                if (2 !== $children->count()) {
                    return;
                }

                $key = trim($children->eq(0)->text());
                $value = trim($children->eq(1)->text());

                switch ($key) {
                    case 'Тату':
                        $actressDTO->setTattoo($value);
                        break;
                    case 'Раса':
                        $actressDTO->setRace($value);
                        break;
                    case 'Грудь':
                        $actressDTO->setBreast($value);
                        break;
                    case 'Цвет глаз':
                        $actressDTO->setEyeColor($value);
                        break;
                    case 'Пирсинг на':
                        $actressDTO->setPiercing($value);
                        break;
                    case 'Цвет волос':
                        $actressDTO->setHairColor($value);
                        break;
                    case 'Знак зодиака':
                        $actressDTO->setZodiacSign($value);
                        break;
                    case 'Размер бюста':
                        [$size] = explode(' ', $value);
                        $actressDTO->setBreastSize($size);
                        break;
                    case 'Начало карьеры':
                        if (true === is_numeric($value)) {
                            $actressDTO->setYearStart((int)$value);
                        }
                        break;
                    case 'Размер обуви':
                        if (1 === preg_match('/^(\d+\.?\d+?) eu$/', $value, $matches)) {
                            if (2 === count($matches)) {
                                $actressDTO->setShoeSize((int)$matches[1]);
                            }
                        }
                        break;
                }
            });
        });
    }

    /**
     * @param Crawler $crawler
     * @param ActressDTO $actressDTO
     * @return void
     */
    private function parseNationalityAndDobAndHeightAndWeightAndStatus(Crawler $crawler, ActressDTO $actressDTO): void
    {
        $crawler->filter('div.profile-stats table tr')->each(function (Crawler $c) use($actressDTO): void {
            $children = $c->children();
            if (2 !== $children->count()) {
                return;
            }

            $key = trim($children->eq(0)->text());
            $value = trim($children->eq(1)->text());

            switch ($key) {
                case 'Национальность':
                    $actressDTO->setNationality($value);
                    break;
                case 'Карьерный статус':
                    $actressDTO->setStatus('Активный' === $value);
                    break;
                case 'Родилась':
                    $date = DateTimeImmutable::createFromFormat('d.m.Y', explode(' ', $value)[0]);
                    if (false !== $date) {
                        $actressDTO->setDob($date->setTime(0, 0));
                    }
                    break;
                case 'Рост и вес':
                    if (1 === preg_match('/^(\d+) см \| (\d+) кг$/', $value, $matches)) {
                        if (3 === count($matches)) {
                            $actressDTO->setHeight((int)$matches[1]);
                            $actressDTO->setWeight((int)$matches[2]);
                        }
                    }
                    break;
            }
        });
    }

    /**
     * @param string $html
     * @return ActressDTO
     */
    public function parse(string $html): ActressDTO
    {
        $crawler = new Crawler($html);

        $actressDTO = new ActressDTO();
        $this->parseName($crawler, $actressDTO);
        $this->parseOther($crawler, $actressDTO);
        $this->parseNationalityAndDobAndHeightAndWeightAndStatus($crawler, $actressDTO);

        return $actressDTO;
    }
}