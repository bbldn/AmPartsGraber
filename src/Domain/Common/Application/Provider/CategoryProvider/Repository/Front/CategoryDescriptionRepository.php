<?php

namespace App\Domain\Common\Application\Provider\CategoryProvider\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\CategoryDescription;

interface CategoryDescriptionRepository
{
    /**
     * @param string $name
     * @return CategoryDescription|null
     */
    public function findOneByName(string $name): ?CategoryDescription;
}