<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\TwigComponents\Tests\Integration\Twig\Components;

use Codeschubser\Bundle\TwigComponents\Tests\Common\AbstractComponentsTestCase;
use Codeschubser\Bundle\TwigComponents\Twig\Component\Card;
use Codeschubser\Bundle\TwigComponents\Twig\Component\Option\VariantInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(Card::class)]
final class CardTest extends AbstractComponentsTestCase
{
    public function testComponentMount(): void
    {
        $component = $this->mountTwigComponent(
            name: Card::class,
        );

        $this->assertInstanceOf(Card::class, $component);
        $this->assertInstanceOf(VariantInterface::class, $component);
    }

    public function testComponentMountFailsWithNoTitleButWithSubtitle(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->mountTwigComponent(
            name: Card::class,
            data: [
                'subtitle' => 'Card subtitle',
            ]
        );
    }

    public function testComponentMountFailsWithInvalidVariant(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->mountTwigComponent(
            name: Card::class,
            data: [
                'variant' => 'foobar',
            ]
        );
    }

    #[DataProvider('provideData')]
    public function testComponentRenders(?string $title = null, ?string $subtitle = null, ?string $text = null): void
    {
        $rendered = $this->renderTwigComponent(
            name: 'Card',
            data: [
                'title' => $title,
                'subtitle' => $subtitle,
                'text' => $text,
            ]
        );

        $this->assertCount(1, $component = $rendered->crawler()->filter('div.card'));

        if ($title) {
            $this->assertCount(1, $component->filter('.card-title'));
            $this->assertSame($title, $component->filter('.card-title')->first()->text());
        }

        if ($subtitle) {
            $this->assertCount(1, $component->filter('.card-subtitle'));
            $this->assertSame($subtitle, $component->filter('.card-subtitle')->first()->text());
        }

        if ($text) {
            $this->assertCount(1, $component->filter('.card-text'));
            $this->assertSame($text, $component->filter('.card-text')->first()->text());
        }
    }

    public static function provideData(): \Generator
    {
        yield 'title only' => ['Card title'];
        yield 'title and subtitle' => ['Card title', 'Card subtitle'];
        yield 'text only' => [null, null, 'Card text'];
        yield 'all' => ['Card title', 'Card subtitle', 'Card text'];
    }

    #[DataProvider('provideVariants')]
    public function testComponentVariantRenders(string $variant): void
    {
        $rendered = $this->renderTwigComponent(
            name: 'Card',
            data: [
                'variant' => $variant,
            ]
        );

        $this->assertCount(1, $component = $rendered->crawler()->filter('.card'));
        $this->assertCount(1, $component->filter('.text-bg-' . $variant));
    }

    public static function provideVariants(): \Generator
    {
        yield 'primary' => ['primary'];
        yield 'secondary' => ['secondary'];
        yield 'info' => ['info'];
        yield 'success' => ['success'];
        yield 'warning' => ['warning'];
        yield 'danger' => ['danger'];
        yield 'light' => ['light'];
        yield 'dark' => ['dark'];
    }

    #[DataProvider('provideContent')]
    public function testComponentContentRenders(?string $header = null, ?string $footer = null, ?string $image = null): void
    {
        $rendered = $this->renderTwigComponent(
            name: 'Card',
            data: [
                'header' => $header,
                'footer' => $footer,
                'image' => $image,
            ]
        );

        $this->assertCount(1, $component = $rendered->crawler()->filter('div.card'));

        if ($header) {
            $this->assertCount(1, $component->filter('.card-header'));
            $this->assertSame($header, $component->filter('.card-header')->first()->text());
        }

        if ($footer) {
            $this->assertCount(1, $component->filter('.card-footer'));
            $this->assertSame($footer, $component->filter('.card-footer')->first()->text());
        }

        if ($image) {
            $this->assertCount(1, $component->filter('.card-image'));
            $this->assertSame($image, $component->filter('.card-image')->attr('src'));

            if (!$header) {
                $this->assertCount(1, $component->filter('.card-img-top'));
            }
        }
    }

    public static function provideContent(): \Generator
    {
        yield 'header' => ['Card header'];
        yield 'footer' => [null, 'Card footer'];
        yield 'image' => [null, null, '/path/to/image.jpg'];
        yield 'all' => ['Card title', 'Card footer', '/path/to/image.jpg'];
    }
}
