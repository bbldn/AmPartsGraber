<?php

namespace App\Domain\Synchronization\Application\Command;

use App\Domain\Common\Application\CommandBus\CommandHandler;

/**
 * @extends CommandHandler<CategoryBackToFrontSynchronizeAll, void>
 */
interface CategoryBackToFrontSynchronizeAllHandler extends CommandHandler
{
}