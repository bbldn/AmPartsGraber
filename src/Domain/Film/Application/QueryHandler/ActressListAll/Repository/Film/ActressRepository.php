<?php

namespace App\Domain\Film\Application\QueryHandler\ActressListAll\Repository\Film;

use App\Domain\Common\Domain\Entity\Base\Film\Actress;

interface ActressRepository
{
    /**
     * @return Actress[]
     *
     * @psalm-return list<Actress>
     *
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function findAll();
}