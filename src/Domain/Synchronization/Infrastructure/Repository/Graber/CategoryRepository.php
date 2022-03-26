<?php

namespace App\Domain\Synchronization\Infrastructure\Repository\Graber;

use App\Domain\Common\Infrastructure\Repository\Base\Graber\CategoryRepository as Base;
use App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler\Repository\Graber\CategoryRepository as CategoryRepositoryCategoryBackToFrontSynchronizeAllHandler;

class CategoryRepository extends Base implements CategoryRepositoryCategoryBackToFrontSynchronizeAllHandler
{

}