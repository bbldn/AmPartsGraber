<?php

namespace App\Domain\Synchronization\Infrastructure\Repository\Graber;

use App\Domain\Common\Infrastructure\Repository\Base\Graber\ProductRepository as Base;
use App\Domain\Synchronization\Application\CommandHandler\ProductBackToFrontSynchronizeAllHandler\Repository\Graber\ProductRepository as ProductRepositoryProductBackToFrontSynchronizeAllHandler;

class ProductRepository extends Base implements ProductRepositoryProductBackToFrontSynchronizeAllHandler
{

}