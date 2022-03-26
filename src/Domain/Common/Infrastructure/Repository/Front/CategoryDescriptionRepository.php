<?php

namespace App\Domain\Common\Infrastructure\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\CategoryDescription;
use App\Domain\Common\Infrastructure\Repository\Base\Front\CategoryDescriptionRepository as Base;
use App\Domain\Common\Application\Provider\CategoryProvider\Repository\Front\CategoryDescriptionRepository as CategoryDescriptionRepositoryCategoryProvider;

class CategoryDescriptionRepository extends Base implements CategoryDescriptionRepositoryCategoryProvider
{
    /**
     * @param string $name
     * @return CategoryDescription|null
     */
    public function findOneByName(string $name): ?CategoryDescription
    {
        return $this->findOneBy(['name' => $name]);
    }
}