<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Tests\Integration\Twig\Components;

use Codeschubser\Bundle\BootstrapTwigComponentsBundle\Tests\Common\AbstractComponentsTestCase;
use Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component\Icon;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;

#[CoversClass(Icon::class)]
#[Group('icon')]
final class IconTest extends AbstractComponentsTestCase
{
    #[DataProvider('provideIconNames')]
    public function testComponentRenders(string $name): void
    {
        $rendered = $this->renderTwigComponent(
            name: Icon::class,
            data: [
                'name' => $name,
            ],
        );

        $this->assertCount(1, $rendered->crawler()->filter('span.icon'));
    }

    public static function provideIconNames(): \Generator
    {
        yield 'bootstrap icon' => ['bi bi-person'];
        yield 'font awesome icon' => ['fa fa-user'];
        yield 'symfony ux icon' => ['bi:person'];
    }
}
