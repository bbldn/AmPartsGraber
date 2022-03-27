<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryPathListSynchronizer;

use Closure;
use App\Domain\Common\Application\Helper\Rebuilder;
use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Common\Domain\Entity\Base\Front\CategoryPath as CategoryFrontPath;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryPathListSynchronizer\DTO\Item;

class Synchronizer
{
    /**
     * @param CategoryFrontPath $categoryFrontPath
     * @param Item $item
     * @return void
     */
    private function fillCategoryFrontPath(CategoryFrontPath $categoryFrontPath, Item $item): void
    {
        $categoryFrontPath->setLevel($item->getLevel());
        $categoryFrontPath->setCategoryA($item->getCategoryA());
        $categoryFrontPath->setCategoryB($item->getCategoryB());
    }

    /**
     * @param CategoryFront $categoryFront
     * @return array
     *
     * @psalm-return array<int, Item>
     */
    private function generateTableByCategoryFront(CategoryFront $categoryFront): array
    {
        $level = 0;
        $table = [];

        $parentCategory = $categoryFront->getParent();
        if (null !== $parentCategory) {
            do {
                $parentCategoryId = (int)$parentCategory->getId();
                if (0 !== $parentCategoryId) {
                    $table[$parentCategoryId] = new Item($level, $categoryFront, $parentCategory);
                    $level++;
                }
            } while ($parentCategory = $parentCategory->getParent());
        }

        $table[(int)$categoryFront->getId()] = new Item($level, $categoryFront, $categoryFront);

        return $table;
    }

    /**
     * @return Closure[]
     *
     * @psalm-return list<Closure>
     */
    private function getCallbackList(): array
    {
        $callback = static function (CategoryFrontPath $categoryFrontPath): ?int {
            /** @var CategoryFront $categoryB */
            $categoryB = $categoryFrontPath->getCategoryB();

            return $categoryB->getId();
        };

        return [$callback];
    }

    /**
     * @param CategoryFront $categoryFront
     * @return void
     */
    public function synchronize(CategoryFront $categoryFront): void
    {
        if (null === $categoryFront->getId()) {
            return;
        }

        [$callback] = $this->getCallbackList();

        $itemMap = $this->generateTableByCategoryFront($categoryFront);
        $categoryFrontPathMap = Rebuilder::rebuildByCallback($categoryFront->getPaths(), $callback);
        foreach ($categoryFrontPathMap as $key => $categoryFrontPath) {
            if (false === key_exists($key, $itemMap)) {
                $categoryFront->getPaths()->removeElement($categoryFrontPath);
                continue;
            }

            $item = $itemMap[$key];
            unset($itemMap[$key]);
            $this->fillCategoryFrontPath($categoryFrontPath, $item);
        }

        foreach ($itemMap as $item) {
            $categoryFrontPath = new CategoryFrontPath();
            $this->fillCategoryFrontPath($categoryFrontPath, $item);

            $categoryFront->getPaths()->add($categoryFrontPath);
        }
    }
}