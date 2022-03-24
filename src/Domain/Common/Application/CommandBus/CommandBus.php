<?php

namespace App\Domain\Common\Application\CommandBus;

interface CommandBus
{
    /**
     * @param mixed $command
     * @return mixed
     */
    public function execute($command);
}