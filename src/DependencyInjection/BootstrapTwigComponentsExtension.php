<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\DependencyInjection\Extension\Extension;

final class BootstrapTwigComponentsExtension extends Extension implements PrependExtensionInterface
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

        $container->prependExtensionConfig('twig_component', [
            'defaults' => [
                'Codeschubser\\Bundle\\BootstrapTwigComponentsBundle\\Twig\\Component\\' => [
                    'template_directory' => '@BootstrapTwigComponentsBundle/components',
                    'name_prefix' => 'cs',
                ],
            ],
        ]);
    }

    public function getAlias(): string
    {
        return 'codeschubser_bootstrap_twig_components_bundle';
    }
}
