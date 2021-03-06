<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseAllSubCategoryListHandler;

use App\Domain\Graber\Domain\Exception\ParseException;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Domain\Graber\Application\Command\ParseAllSubCategoryList;
use App\Domain\Graber\Application\CommandHandler\ParseAllSubCategoryListHandler\CategorySaver\Saver as CategorySaver;
use App\Domain\Graber\Application\CommandHandler\ParseAllSubCategoryListHandler\SubCategoryListParser\Parser as SubCategoryListParser;

class CommandHandler
{
    private CategorySaver $categorySaver;

    private EntityManager $entityManagerGraber;

    private SubCategoryListParser $subCategoryListParser;

    /**
     * @param CategorySaver $categorySaver
     * @param EntityManager $entityManagerGraber
     * @param SubCategoryListParser $subCategoryListParser
     */
    public function __construct(
        CategorySaver $categorySaver,
        EntityManager $entityManagerGraber,
        SubCategoryListParser $subCategoryListParser
    )
    {
        $this->categorySaver = $categorySaver;
        $this->entityManagerGraber = $entityManagerGraber;
        $this->subCategoryListParser = $subCategoryListParser;
    }

    /**
     * @param ParseAllSubCategoryList $command
     * @return void
     */
    public function __invoke(ParseAllSubCategoryList $command): void
    {
        $onParsedCategory = $command->getOnParsedCategory();

        $categoryUrlList = [$command->getUrl()];
        while (count($categoryUrlList) > 0) {
            $url = array_pop($categoryUrlList);
            try {
                $categoryList = $this->subCategoryListParser->parse($url);
            } catch (ParseException $e) {
                continue;
            }

            foreach ($categoryList as $categoryDto) {
                $url = $categoryDto->getUrl();
                if (null === $url) {
                    continue;
                }

                $categoryUrlList[] = $url;
                $this->categorySaver->save($categoryDto);

                if (null !== $onParsedCategory) {
                    call_user_func($onParsedCategory, $categoryDto);
                }
            }
        }

        $this->entityManagerGraber->flush();
    }
}