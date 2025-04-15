<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle;

use Codeschubser\Bundle\BootstrapTwigComponentsBundle\DependencyInjection\BootstrapTwigComponentsExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class BootstrapTwigComponentsBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getContainerExtension(): ExtensionInterface
    {
        return new BootstrapTwigComponentsExtension();
    }
}
