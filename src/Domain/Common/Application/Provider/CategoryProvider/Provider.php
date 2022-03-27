<?php

namespace App\Domain\Common\Application\Provider\CategoryProvider;

use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Common\Domain\Entity\Base\Graber\Category as CategoryGraber;
use App\Domain\Common\Application\Provider\CategoryProvider\Repository\Front\CategoryRepository as CategoryFrontRepository;

class Provider
{
    private CategoryFrontRepository $categoryFrontRepository;

    /**
     * @param CategoryFrontRepository $categoryFrontRepository
     */
    public function __construct(CategoryFrontRepository $categoryFrontRepository)
    {
        $this->categoryFrontRepository = $categoryFrontRepository;
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

        $url = $categoryGraber->getUrl();
        if (null === $url) {
            return null;
        }

        return $this->categoryFrontRepository->findOneByVendorCode($url);
    }
}