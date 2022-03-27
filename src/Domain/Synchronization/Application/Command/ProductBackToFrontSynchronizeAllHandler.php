<?php

namespace App\Domain\Synchronization\Application\Command;

use App\Domain\Common\Application\CommandBus\CommandHandler;

/**
 * @extends CommandHandler<ProductBackToFrontSynchronizeAll, void>
 */
interface ProductBackToFrontSynchronizeAllHandler extends CommandHandler
{
}