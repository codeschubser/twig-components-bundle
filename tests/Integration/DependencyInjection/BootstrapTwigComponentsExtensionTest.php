<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Tests\Integration\DependencyInjection;

use Codeschubser\Bundle\BootstrapTwigComponentsBundle\DependencyInjection\BootstrapTwigComponentsExtension;
use Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component\Alert;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(BootstrapTwigComponentsExtension::class)]
final class BootstrapTwigComponentsExtensionTest extends AbstractExtensionTestCase
{
    public function testPlatformIsSet(): void
    {
        $this->setParameter('kernel.environment', 'test');
        $this->setParameter('kernel.bundles', [
            'TwigComponentBundle' => true,
            'BootstrapTwigComponentsBundle' => true,
        ]);
        $this->load();

        // Just test that a random component is present
        $this->assertContainerBuilderHasService(Alert::class);
    }

    public function testFailsWhenTwigComponentBundleIsMissing(): void
    {
        $this->expectException(\LogicException::class);

        $this->setParameter('kernel.environment', 'test');
        $this->setParameter('kernel.bundles', ['NoTheTwigComponentBundle' => true]);
        $this->load();
    }
    protected function getContainerExtensions(): array
    {
        return [new BootstrapTwigComponentsExtension()];
    }
}
