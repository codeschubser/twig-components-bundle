<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\TwigComponents\Tests\Integration;

use Codeschubser\Bundle\TwigComponents\DependencyInjection\CodeschubserTwigComponentsExtension;
use Codeschubser\Bundle\TwigComponents\Twig\Component\Alert;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CodeschubserTwigComponentsExtension::class)]
final class CodeschubserTwigComponentsBundleExtensionTest extends AbstractExtensionTestCase
{
    public function testPlatformIsSet(): void
    {
        $this->setParameter('kernel.environment', 'test');
        $this->setParameter('kernel.bundles', ['TwigComponentBundle' => true]);
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
        return [new CodeschubserTwigComponentsExtension()];
    }
}
