<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\CategoryBackToFrontSynchronizer\CategoryPathListSynchronizer;

use Closure;
use App\Domain\Common\Application\Helper\Rebuilder;
use App\Domain\Common\Domain\Entity\Base\Front\Category as CategoryFront;
use App\Domain\Common\Domain\Entity\Base\Front\CategoryPath as CategoryFrontPath;
use App\Domain\Common\Application\MultipleEntityManager\EntityManager as MultipleEntityManager;

class Synchronizer
{
    private MultipleEntityManager $multipleEntityManager;

    /**
     * @param MultipleEntityManager $multipleEntityManager
     */
    public function __construct(MultipleEntityManager $multipleEntityManager)
    {
        $this->multipleEntityManager = $multipleEntityManager;
    }

    /**
     * @param CategoryFrontPath $categoryFrontPath
     * @param CategoryFront $categoryFront
     * @param CategoryFront $pathCategoryFront
     * @param int $level
     * @return void
     */
    private function fillCategoryFrontPath(
        CategoryFrontPath $categoryFrontPath,
        CategoryFront $categoryFront,
        CategoryFront $pathCategoryFront,
        int $level
    ): void
    {
        $categoryFrontPath->setLevel($level);
        $categoryFrontPath->setCategoryA($categoryFront);
        $categoryFrontPath->setCategoryB($pathCategoryFront);
    }

    /**
     * @param CategoryFront $categoryFront
     * @return array
     */
    private function generateTableByCategoryFront(CategoryFront $categoryFront): array
    {
        $index = 0;
        $table = [];
        $parentCategory = $categoryFront->getParent();
        if (null !== $parentCategory) {
            do {
                /** @var int $parentCategoryId */
                $parentCategoryId = $parentCategory->getId();
                $table[$parentCategoryId] = [
                    'index' => $index,
                    'categoryA' => $categoryFront,
                    'categoryB' => $parentCategory,
                ];
                $index++;
            } while ($parentCategory = $parentCategory->getParent());
        }

        /** @var int $categoryFrontId */
        $categoryFrontId = $categoryFront->getId();
        $table[$categoryFrontId] = [
            'index' => $index,
            'key' => $categoryFrontId,
            'categoryA' => $categoryFront,
            'categoryB' => $categoryFront,
        ];

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
            $categoryB = $categoryFrontPath->getCategoryB();

            return null === $categoryB ? null : $categoryB->getId();
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

        $table = $this->generateTableByCategoryFront($categoryFront);
        $categoryFrontPathsByCategoryBId = Rebuilder::rebuildByCallback($categoryFront->getPaths(), $callback);
        foreach ($categoryFrontPathsByCategoryBId as $key => $item) {
            if (false === key_exists($key, $table)) {
                $categoryFront->getPaths()->removeElement($item);
                continue;
            }

            $row = $table[$key];
            unset($table[$key]);
            $this->multipleEntityManager->persistFront($item);
            $this->fillCategoryFrontPath($item, $row['categoryA'], $row['categoryB'], $row['index']);
        }

        foreach ($table as $row) {
            $item = new CategoryFrontPath();
            $this->fillCategoryFrontPath($item, $row['categoryA'], $row['categoryB'], $row['index']);

            $categoryFront->getPaths()->add($item);
            $this->multipleEntityManager->persistFront($item);
        }
    }
}