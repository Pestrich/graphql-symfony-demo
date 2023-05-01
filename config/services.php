<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator
        ->services()
        ->defaults()
        ->autowire()
        ->autoconfigure();

    /*$services->load('App\\', '../src/')->exclude(
        '../src/{DependencyInjection,Entity,Kernel.php}'
    );*/

    $services->load(
        'App\\GraphQL\\Resolver\\',
        '../src/GraphQL/Resolver'
    )->public();

    /*$services->load(
        'App\\Controller\\',
        '../src/Controller'
    )->tag('controller.service_arguments')->public();*/
};
