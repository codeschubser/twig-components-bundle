<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\TwigComponents\Tests\Integration\Twig\Components;

use Codeschubser\Bundle\TwigComponents\Tests\Common\AbstractComponentsTestCase;
use Codeschubser\Bundle\TwigComponents\Twig\Component\Button;
use Codeschubser\Bundle\TwigComponents\Twig\Component\Dropdown;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(Dropdown::class)]
#[CoversClass(Button::class)]
#[CoversClass(Dropdown\DropdownItem::class)]
#[CoversClass(Dropdown\DropdownHeader::class)]
#[CoversClass(Dropdown\DropdownDivider::class)]
#[CoversClass(Dropdown\DropdownText::class)]
final class DropdownTest extends AbstractComponentsTestCase
{
    public function testComponentMount(): void
    {
        $component = $this->mountTwigComponent(
            name: Dropdown::class,
            data: [
                'items' => [
                    new Dropdown\DropdownItem(label: 'Item 1', link: '#'),
                ],
            ]
        );

        $this->assertInstanceOf(Dropdown::class, $component);
    }

    public function testComponentMountFailsWithEmptyItems(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->mountTwigComponent(
            name: Dropdown::class,
        );
    }

    public function testComponentMountFailsWithInvalidVariant(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->mountTwigComponent(
            name: Dropdown::class,
            data: [
                'variant' => 'foobar',
            ]
        );
    }

    public function testComponentRenders(): void
    {
        $rendered = $this->renderTwigComponent(
            name: 'Dropdown',
            data: [
                'items' => [
                    new Dropdown\DropdownHeader(label: 'Item 1'),
                    new Dropdown\DropdownItem(label: 'Item 1', link: '#first', target: '_blank', icon: 'bi bi-star-fill'),
                    new Dropdown\DropdownDivider(),
                    new Dropdown\DropdownItem(label: 'Item 1', link: '#last', isCurrent: true),
                    new Dropdown\DropdownText('Lorem ipsum'),
                ],
            ]
        );

        $this->assertCount(1, $component = $rendered->crawler()->filter('div.dropdown'));
        $this->assertCount(5, $component->filter('.dropdown-menu>li'));
        $this->assertCount(1, $component->filter('.dropdown-header'));
        $this->assertCount(1, $component->filter('.dropdown-divider'));
        $this->assertSame('#last', $component->filter('.dropdown-item.active')->attr('href'));
        $this->assertSame('true', $component->filter('.dropdown-item.active')->attr('aria-current'));
        $this->assertSame('_blank', $component->filter('.dropdown-item[href="#first"]')->attr('target'));
        $this->assertSame('bi bi-star-fill me-2', $component->filter('.dropdown-item>span')->attr('class'));
        $this->assertSame('true', $component->filter('.dropdown-item>span')->attr('aria-hidden'));
        $this->assertCount(1, $component->filter('.dropdown-item-text'));
    }

    public function testComponentDropUpRenders(): void
    {
        $rendered = $this->renderTwigComponent(
            name: 'Dropdown',
            data: [
                'isDropUp' => true,
                'items' => [
                    new Dropdown\DropdownItem(label: 'Item 1', link: '#'),
                ],
            ]
        );

        $this->assertCount(1, $rendered->crawler()->filter('.dropdown.dropup'));
    }

    public function testComponentRightAlignedMenuRenders(): void
    {
        $rendered = $this->renderTwigComponent(
            name: 'Dropdown',
            data: [
                'isRightAligned' => true,
                'items' => [
                    new Dropdown\DropdownItem(label: 'Item 1', link: '#'),
                ],
            ]
        );

        $this->assertCount(1, $rendered->crawler()->filter('.dropdown-menu-end'));
    }

    #[DataProvider('provideVariants')]
    public function testComponentVariantRenders(string $variant): void
    {
        $rendered = $this->renderTwigComponent(
            name: 'Dropdown',
            data: [
                'variant' => $variant,
                'items' => [
                    new Dropdown\DropdownItem(label: 'Item 1', link: '#'),
                ],
            ]
        );

        $this->assertCount(1, $component = $rendered->crawler()->filter('.dropdown'));
        $this->assertCount(1, $component->filter('.dropdown-toggle.btn-' . $variant));
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
}
