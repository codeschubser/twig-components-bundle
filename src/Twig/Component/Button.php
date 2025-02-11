<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\TwigComponents\Twig\Component;

use Codeschubser\Bundle\TwigComponents\Twig\Component\Option\ButtonType;
use Codeschubser\Bundle\TwigComponents\Twig\Component\Option\Variant;
use Codeschubser\Bundle\TwigComponents\Twig\Component\Option\VariantInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'Button', template: '@CodeschubserTwigComponents/components/Button.html.twig', exposePublicProps: false)]
final class Button implements VariantInterface
{
    public Variant $variant;
    public ButtonType $type;
    public ?string $label = null;
    public ?string $icon = null;
    private bool $isOutline = false;
    private bool $isClose = false;

    public function mount(string|Variant $variant, string|ButtonType $type = ButtonType::BUTTON): void
    {
        if (\is_string($variant)) {
            if (str_contains($variant, 'outline')) {
                $this->isOutline = true;
                $variant = substr($variant, 8);
            }

            if (str_contains($variant, 'close')) {
                $this->isClose = true;
                $variant = Variant::PRIMARY;
            }
        }

        try {
            $this->variant = \is_string($variant) ? Variant::from($variant) : $variant;
        } catch (\ValueError $valueError) {
            throw new \InvalidArgumentException(
                message: sprintf('The variant "%s" is not valid. Valid values are: %s', $variant, implode(', ', array_map(static fn (Variant $variant): string => $variant->value, Variant::cases()))),
                code: $valueError->getCode(),
                previous: $valueError
            );
        }

        try {
            $this->type = \is_string($type) ? ButtonType::from($type) : $type;
        } catch (\ValueError $valueError) {
            throw new \InvalidArgumentException(
                message: sprintf('The type "%s" is not valid. Valid values are: %s', $type, implode(', ', array_map(static fn (ButtonType $type): string => $type->value, ButtonType::cases()))),
                code: $valueError->getCode(),
                previous: $valueError
            );
        }
    }

    public function getDefaultCssClass(): string
    {
        if ($this->isClose) {
            return 'btn-close';
        }

        if ($this->isOutline) {
            return sprintf('btn btn-outline-%s', $this->variant->value);
        }

        return sprintf('btn btn-%s', $this->variant->value);
    }

    public function getType(): string
    {
        return $this->type->value;
    }
}
