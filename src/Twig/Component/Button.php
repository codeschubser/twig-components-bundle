<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\TwigComponents\Twig\Component;

use Codeschubser\Bundle\TwigComponents\Twig\Component\Option\Variant;
use Codeschubser\Bundle\TwigComponents\Twig\Component\Option\VariantInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'Button', template: '@CodeschubserTwigComponents/components/Button.html.twig', exposePublicProps: false)]
final class Button implements VariantInterface
{
    public Variant $variant = Variant::INFO;
    public ?string $label = null;
    public ?string $icon = null;
    public bool $isSubmit = false;

    public function mount(string|Variant $variant): void
    {
        try {
            $this->variant = \is_string($variant) ? Variant::from($variant) : $variant;
        } catch (\ValueError $valueError) {
            throw new \InvalidArgumentException(
                sprintf(
                    'The variant "%s" is not valid. Valid values are: %s',
                    $variant,
                    implode(
                        ', ',
                        array_map(
                            static fn (Variant $variant): string => $variant->value,
                            Variant::cases()
                        )
                    )
                ),
                $valueError->getCode(),
                $valueError
            );
        }
    }

    public function getDefaultCssClass(): string
    {
        return sprintf('btn btn-%s', $this->variant->value);
    }
}
