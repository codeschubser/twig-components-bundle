<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Tests\Common;

use Codeschubser\Bundle\BootstrapTwigComponentsBundle\BootstrapTwigComponentsBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\UX\TwigComponent\TwigComponentBundle;

final class TestKernel extends Kernel
{
    use MicroKernelTrait;

    /**
     * @return list<BundleInterface>
     */
    public function registerBundles(): array
    {
        return [
            new FrameworkBundle(),
            new TwigBundle(),
            new TwigComponentBundle(),
            new BootstrapTwigComponentsBundle(),
        ];
    }

    /**
     * @phpstan-ignore method.unused
     */
    private function configureContainer(ContainerBuilder $container, LoaderInterface $loader): void
    {
        $loader->load(static function (ContainerBuilder $container): void {
            $container->setParameter('kernel.secret', 'Geheimnis!');

            $container->loadFromExtension('framework', [
                'test' => true,
            ]);
        });
    }

}
