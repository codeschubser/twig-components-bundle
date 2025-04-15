<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Tests\Integration;

use Codeschubser\Bundle\BootstrapTwigComponentsBundle\BootstrapTwigComponentsBundle;
use Codeschubser\Bundle\BootstrapTwigComponentsBundle\DependencyInjection\BootstrapTwigComponentsExtension;
use Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component\Alert;
use Nyholm\BundleTest\TestKernel;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\UX\TwigComponent\TwigComponentBundle;

#[CoversClass(BootstrapTwigComponentsBundle::class)]
#[CoversClass(BootstrapTwigComponentsExtension::class)]
final class BootstrapTwigComponentsBundleInitializationTest extends KernelTestCase
{
    protected function tearDown(): void
    {
        parent::tearDown();

        self::$class = null; // Kill used Kernel class
    }

    public function testInitBundle(): void
    {
        self::bootKernel();
        $container = self::getContainer();

        $this->assertTrue($container->has(Alert::class));
        $this->assertInstanceOf(Alert::class, $container->get(Alert::class));
    }

    protected static function ensureKernelShutdown(): void
    {
        $wasBooted = self::$booted;
        parent::ensureKernelShutdown();

        if ($wasBooted) {
            restore_exception_handler();
        }
    }

    protected static function getKernelClass(): string
    {
        return TestKernel::class;
    }

    /**
     * @param list<mixed> $options
     */
    protected static function createKernel(array $options = []): KernelInterface
    {
        /** @var TestKernel $kernel */
        $kernel = parent::createKernel($options);
        $kernel->addTestBundle(TwigBundle::class);
        $kernel->addTestBundle(TwigComponentBundle::class);
        $kernel->addTestBundle(BootstrapTwigComponentsBundle::class);
        $kernel->handleOptions($options);
        $kernel->setClearCacheAfterShutdown(true);

        return $kernel;
    }
}
