<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseAllSubCategoryListHandler\CategorySaver;

use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Domain\Graber\Domain\DTO\Category as CategoryDTO;
use App\Domain\Common\Domain\Entity\Base\Graber\Category;
use App\Domain\Common\Domain\Entity\Base\Graber\Category as CategoryEntity;
use App\Domain\Graber\Application\CommandHandler\ParseAllSubCategoryListHandler\CategorySaver\Repository\CategoryRepository;

class Saver
{
    private EntityManager $entityManagerGraber;

    private CategoryRepository $categoryRepository;

    /**
     * @param EntityManager $entityManagerGraber
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        EntityManager $entityManagerGraber,
        CategoryRepository $categoryRepository
    )
    {
        $this->entityManagerGraber = $entityManagerGraber;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param CategoryEntity $category
     * @return string|null
     */
    private function getParentCategoryUrl(Category $category): ?string
    {
        $url = $category->getUrl();
        if (null === $url) {
            return null;
        }

        $itemList = explode('/', $url);

        return implode('/', array_splice($itemList, 0, count($itemList) - 1));
    }

    /**
     * @param CategoryDTO $categoryDto
     * @return CategoryEntity
     */
    public function save(CategoryDTO $categoryDto): CategoryEntity
    {
        $url = (string)$categoryDto->getUrl();
        $categoryEntity = $this->categoryRepository->findOneByUrl($url);
        if (null === $categoryEntity) {
            $categoryEntity = new CategoryEntity();
        }

        $parentCategoryUrl = $this->getParentCategoryUrl($categoryEntity);
        if (null !== $parentCategoryUrl) {
            $parentCategoryEntity = $this->categoryRepository->findOneByUrl($parentCategoryUrl);
        } else {
            $parentCategoryEntity = null;
        }

        $categoryEntity->setParent($parentCategoryEntity);

        $categoryEntity->setUrl($url);
        $categoryEntity->setName($categoryDto->getName());

        $this->entityManagerGraber->persist($categoryEntity);

        return $categoryEntity;
    }
}