<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Tests\Common;

use PHPUnit\Framework\Attributes\After;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\Test\InteractsWithTwigComponents;

abstract class AbstractComponentsTestCase extends KernelTestCase
{
    use InteractsWithTwigComponents;

    #[After]
    public function __internalDisableErrorHandler(): void
    {
        restore_exception_handler();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        static::$class = null; // Kill used Kernel class
    }

    protected static function getKernelClass(): string
    {
        return TestKernel::class;
    }
}
