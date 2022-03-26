<?php

namespace App\Domain\Common\Application\Provider\LayoutProvider;

use App\Domain\Common\Domain\Entity\Base\Front\Layout as LayoutFront;
use App\Domain\Common\Application\Provider\LayoutProvider\Repository\Front\LayoutRepository as LayoutFrontRepository;

class Provider
{
    private LayoutFrontRepository $layoutFrontRepository;

    /**
     * @param LayoutFrontRepository $layoutFrontRepository
     */
    public function __construct(LayoutFrontRepository $layoutFrontRepository)
    {
        $this->layoutFrontRepository = $layoutFrontRepository;
    }

    /**
     * @return LayoutFront
     */
    public function getDefaultCategoryLayoutFront(): LayoutFront
    {
        /** @psalm-var LayoutFront */
        return $this->layoutFrontRepository->findOne(3);
    }

    /**
     * @param LayoutFront|null $layoutFront
     * @return bool
     */
    public function isDefaultCategoryLayoutFront(?LayoutFront $layoutFront): bool
    {
        if (null === $layoutFront) {
            return false;
        }

        return  $this->getDefaultCategoryLayoutFront()->getId() === $layoutFront->getId();
    }
}