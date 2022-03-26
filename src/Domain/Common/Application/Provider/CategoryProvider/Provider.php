<?php

namespace App\Domain\Common\Application\Provider\CategoryProvider;

use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Category as CategoryGraber;
use App\Domain\Common\Application\Provider\CategoryProvider\Repository\Front\CategoryRepository as CategoryFrontRepository;
use App\Domain\Common\Application\Provider\CategoryProvider\Repository\Front\CategoryDescriptionRepository as CategoryDescriptionFrontRepository;

class Provider
{
    private CategoryFrontRepository $categoryFrontRepository;

    private CategoryDescriptionFrontRepository $categoryDescriptionFrontRepository;

    /**
     * @param CategoryFrontRepository $categoryFrontRepository
     * @param CategoryDescriptionFrontRepository $categoryDescriptionFrontRepository
     */
    public function __construct(
        CategoryFrontRepository $categoryFrontRepository,
        CategoryDescriptionFrontRepository $categoryDescriptionFrontRepository
    )
    {
        $this->categoryFrontRepository = $categoryFrontRepository;
        $this->categoryDescriptionFrontRepository = $categoryDescriptionFrontRepository;
    }

    /**
     * @return CategoryFront
     */
    public function getDefaultParentCategory(): CategoryFront
    {
        return $this->categoryFrontRepository->findOne(0);
    }

    /**
     * @param CategoryGraber|null $categoryGraber
     * @return CategoryFront|null
     */
    public function getCategoryFrontBeCategoryGraber(?CategoryGraber $categoryGraber): ?CategoryFront
    {
        if (null === $categoryGraber) {
            return null;
        }

        $name = (string)$categoryGraber->getName();
        $categoryDescriptionFront = $this->categoryDescriptionFrontRepository->findOneByName($name);
        if (null === $categoryDescriptionFront) {
            return null;
        }

        return $categoryDescriptionFront->getCategory();
    }
}