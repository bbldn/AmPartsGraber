<?php

namespace App\Domain\Graber\Application\Command;

use App\Domain\Common\Application\CommandBus\CommandHandler;

/**
 * @extends CommandHandler<ParseAllSubCategoryList, void>
 */
interface ParseAllSubCategoryListHandler extends CommandHandler
{
}