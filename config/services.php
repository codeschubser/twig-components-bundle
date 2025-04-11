<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function(ContainerConfigurator $configurator): void {
    $services = $configurator->services();

    $services
        ->defaults()
        ->private()
        ->autowire()
        ->autoconfigure()
    ;

    $services
        ->load('Codeschubser\\Bundle\\BootstrapTwigComponentsBundle\\', '../src/*')
        ->exclude('../src/{DependencyInjection}')
    ;
};
