<?php

namespace App\Domain\Common\Application\CommandBus;

/**
 * @template TCommand
 * @template TReturn
 * @method mixed __invoke(mixed $command)
 *
 * @psalm-method TReturn __invoke(TCommand $command)
 */
interface CommandHandler
{
}