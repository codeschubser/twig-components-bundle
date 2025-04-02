<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\TwigComponents\Tests\Integration\Twig\Components;

use Codeschubser\Bundle\TwigComponents\Tests\Common\AbstractComponentsTestCase;
use Codeschubser\Bundle\TwigComponents\Twig\Component\Icon;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(Icon::class)]
final class IconTest extends AbstractComponentsTestCase
{
    #[DataProvider('provideIconNames')]
    public function testComponentRenders(string $name): void
    {
        $rendered = $this->renderTwigComponent(
            name: 'Icon',
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
