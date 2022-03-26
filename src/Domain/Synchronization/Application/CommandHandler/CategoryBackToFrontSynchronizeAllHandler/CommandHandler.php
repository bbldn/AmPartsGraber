<?php

namespace App\Domain\Synchronization\Application\CommandHandler\CategoryBackToFrontSynchronizeAllHandler;

use App\Domain\Synchronization\Application\Command\CategoryBackToFrontSynchronizeAll;
use App\Domain\Synchronization\Application\Command\CategoryBackToFrontSynchronizeAllHandler as Base;

class CommandHandler implements Base
{
    public function __invoke(CategoryBackToFrontSynchronizeAll $command): void
    {

    }
}