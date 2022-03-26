<?php

namespace App\Domain\Common\Application\Provider\LayoutProvider\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\Layout;

interface LayoutRepository
{
    /**
     * @param int $id
     * @return Layout|null
     */
    public function findOne(int $id): ?Layout;
}