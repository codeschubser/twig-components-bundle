<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\TwigComponents\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\DependencyInjection\Extension\Extension;

final class CodeschubserTwigComponentsExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $env = $container->getParameter('kernel.environment');
        assert(is_string($env));
        $loader = new PhpFileLoader($container, new FileLocator(__DIR__.'/../../config'), $env);

        $loader->load('services.php');
    }

    public function prepend(ContainerBuilder $container): void
    {
        /** @var array<string, bool> $bundles */
        $bundles = $container->getParameter('kernel.bundles');

        if (!isset($bundles['TwigComponentBundle'])) {
            throw new \LogicException('TwigComponentBundle must be registered!');
        }

        $config = ['defaults' => ['Codeschubser\Bundle\TwigComponents\\' => '@CodeschubserTwigComponents/components']];
        $container->prependExtensionConfig('twig_component', $config);
    }

    public function getAlias(): string
    {
        return 'codeschubser_twig_components';
    }
}
