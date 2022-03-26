<?php

namespace App\Domain\Graber\Application\Command;

use App\Domain\Common\Application\CommandBus\CommandHandler;

/**
 * @extends CommandHandler<DownloadProductImageListAll, void>
 */
interface DownloadProductImageListAllHandler extends CommandHandler
{
}