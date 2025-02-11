<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\TwigComponents\Tests\Integration\Twig\Components;

use Codeschubser\Bundle\TwigComponents\Tests\Common\AbstractComponentsTestCase;
use Codeschubser\Bundle\TwigComponents\Twig\Component\Button;
use Codeschubser\Bundle\TwigComponents\Twig\Component\Option\ButtonType;
use Codeschubser\Bundle\TwigComponents\Twig\Component\Option\Variant;
use Codeschubser\Bundle\TwigComponents\Twig\Component\Option\VariantInterface;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Button::class)]
#[CoversClass(Variant::class)]
#[CoversClass(ButtonType::class)]
final class ButtonTest extends AbstractComponentsTestCase
{
    public function testComponentMount(): void
    {
        $component = $this->mountTwigComponent(
            name: 'Button',
            data: [
                'variant' => 'danger',
            ],
        );

        $this->assertInstanceOf(Button::class, $component);
        $this->assertInstanceOf(VariantInterface::class, $component);
        $this->assertSame(Variant::from('danger'), $component->variant);
    }

    public function testComponentMountFail(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->mountTwigComponent(
            name: 'Button',
            data: [
                'variant' => 'foobar',
            ],
        );
    }

    public function testComponentTypeMountFail(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->mountTwigComponent(
            name: Button::class,
            data: [
                'variant' => 'success',
                'type' => 'foobar',
            ],
        );
    }

    public function testComponentWithIconMount(): void
    {
        $component = $this->mountTwigComponent(
            name: 'Button',
            data: [
                'variant' => 'danger',
                'icon' => 'bi bi-info-circle',
            ],
        );

        $this->assertInstanceOf(Button::class, $component);
        $this->assertSame(Variant::from('danger'), $component->variant);
    }

    public function testComponentRenders(): void
    {
        $rendered = $this->renderTwigComponent(
            name: 'Button',
            data: [
                'variant' => 'success',
            ],
        );

        $this->assertCount(1, $component = $rendered->crawler()->filter('.btn.btn-success'));
        $this->assertCount(1, $component->filter('button[type="button"]'));
    }

    public function testComponentWithOutlineVariantRenders(): void
    {
        $rendered = $this->renderTwigComponent(
            name: 'Button',
            data: [
                'variant' => 'outline-success',
            ],
        );

        $this->assertCount(1, $component = $rendered->crawler()->filter('.btn.btn-outline-success'));
    }

    public function testComponentAsSubmitRenders(): void
    {
        $rendered = $this->renderTwigComponent(
            name: 'Button',
            data: [
                'variant' => 'success',
                'type' => 'submit',
            ],
        );

        $this->assertCount(1, $component = $rendered->crawler()->filter('.btn.btn-success'));
        $this->assertCount(1, $component->filter('button[type="submit"]'));
    }

    public function testComponentAsResetRenders(): void
    {
        $rendered = $this->renderTwigComponent(
            name: 'Button',
            data: [
                'variant' => 'secondary',
                'type' => ButtonType::RESET,
            ],
        );

        $this->assertCount(1, $component = $rendered->crawler()->filter('.btn.btn-secondary'));
        $this->assertCount(1, $component->filter('button[type="reset"]'));
    }

    public function testComponentWithIconRenders(): void
    {
        $rendered = $this->renderTwigComponent(
            name: 'Button',
            data: [
                'variant' => 'warning',
                'icon' => 'bi-exclamation-triangle-fill',
            ],
        );

        $this->assertCount(1, $rendered->crawler()->filter('.bi-exclamation-triangle-fill'));
    }

    public function testComponentWithAdditionalParamsRenders(): void
    {
        $rendered = $this->renderTwigComponent(
            name: 'Button',
            data: [
                'variant' => 'warning',
                'class' => 'btn-lg',
            ],
        );

        $this->assertCount(1, $component = $rendered->crawler()->filter('.btn.btn-warning'));
        $this->assertCount(1, $component->filter('.btn.btn-lg'));
    }
}
