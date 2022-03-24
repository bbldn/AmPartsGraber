<?php

namespace App\Domain\Graber\Application\CommandHandler\ParseAllSubCategoryListHandler\CategorySaver;

use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Domain\Graber\Domain\DTO\Category as CategoryDTO;
use App\Domain\Graber\Domain\Entity\Category as CategoryEntity;
use App\Domain\Graber\Application\CommandHandler\ParseAllSubCategoryListHandler\CategorySaver\Repository\CategoryRepository;

class Saver
{
    private EntityManager $entityManager;

    private CategoryRepository $categoryRepository;

    /**
     * @param EntityManager $entityManager
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        EntityManager $entityManager,
        CategoryRepository $categoryRepository
    )
    {
        $this->entityManager = $entityManager;
        $this->categoryRepository = $categoryRepository;
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

        $categoryEntity->setUrl($url);
        $categoryEntity->setName($categoryDto->getName());

        $this->entityManager->persist($categoryEntity);

        return $categoryEntity;
    }
}