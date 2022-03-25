<?php

namespace App\Domain\Graber\Application\Command;

use App\Domain\Common\Application\CommandBus\CommandHandler;

/**
 * @extends CommandHandler<ParseProductListAll, void>
 */
interface ParseProductListAllHandler extends CommandHandler
{
}