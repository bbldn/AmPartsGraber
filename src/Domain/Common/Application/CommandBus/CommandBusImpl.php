<?php

namespace App\Domain\Common\Application\CommandBus;

use LogicException;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;

class CommandBusImpl implements CommandBus
{
    private ContainerInterface $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param mixed $command
     * @return mixed
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     */
    public function execute($command)
    {
        $commandClassName = get_class($command);
        $commandHandlerClassName = "{$commandClassName}Handler";

        if (false === $this->container->has($commandHandlerClassName)) {
            throw new LogicException("Handler for $commandClassName not found");
        }

        /** @var CommandHandler $commandHandler */
        $commandHandler = $this->container->get($commandHandlerClassName);

        /** @psalm-suppress InvalidFunctionCall */
        return call_user_func($commandHandler, $command);
    }
}