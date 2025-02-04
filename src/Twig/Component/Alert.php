<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\TwigComponents\Twig\Component;

use Codeschubser\Bundle\TwigComponents\Twig\Component\Option\Variant;
use Codeschubser\Bundle\TwigComponents\Twig\Component\Option\VariantInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'Alert', template: '@CodeschubserTwigComponents/components/Alert.html.twig', exposePublicProps: false)]
final class Alert implements VariantInterface
{
    public Variant $variant = Variant::INFO;
    public ?string $message = null;
    public bool $dismissible = false;
    public ?string $title = null;
    public ?string $icon = null;

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
        $cssClass = sprintf('alert alert-%s', $this->variant->value);

        if ($this->dismissible) {
            $cssClass .= ' alert-dismissible';
        }

        if ($this->icon || $this->title) {
            $cssClass .= ' d-flex align-items-start';
        }

        return $cssClass;
    }
}
