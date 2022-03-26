<?php

namespace App\Domain\Common\Infrastructure\Repository\Front;

use App\Domain\Common\Domain\Entity\Base\Front\Layout;
use App\Domain\Common\Infrastructure\Repository\Base\Front\LayoutRepository as Base;
use App\Domain\Common\Application\Provider\LayoutProvider\Repository\Front\LayoutRepository as LayoutRepositoryLayoutProvider;

class LayoutRepository extends Base implements LayoutRepositoryLayoutProvider
{
    /**
     * @param int $id
     * @return Layout|null
     */
    public function findOne(int $id): ?Layout
    {
        return $this->find($id);
    }
}