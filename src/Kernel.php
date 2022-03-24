<?php

namespace App;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait {
        configureContainer as configureContainerImported;
    }

    /**
     * @param ContainerConfigurator $container
     * @param LoaderInterface $loader
     * @param ContainerBuilder $builder
     * @return void
     */
    protected function configureContainer(
        ContainerConfigurator $container,
        LoaderInterface $loader,
        ContainerBuilder $builder
    ): void
    {
        $this->configureContainerImported($container, $loader, $builder);

        /** @psalm-suppress MissingFile */
        $serviceList = require 'di.php';
        foreach ($serviceList as $service) {
            $container->import($service);
        }
    }
}