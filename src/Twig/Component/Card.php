<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component;

use Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component\Option\Variant;
use Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component\Option\VariantInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent(name: 'Card', template: '@BootstrapTwigComponents/components/Card.html.twig', exposePublicProps: false)]
final class Card implements VariantInterface
{
    public ?Variant $variant = null;
    public ?string $title = null;
    public ?string $subtitle = null;
    public ?string $text = null;
    public ?string $header = null;
    public ?string $image = null;
    public ?string $footer = null;

    public function mount(null|string|Variant $variant = null): void
    {
        try {
            $this->variant = \is_string($variant) ? Variant::from($variant) : $variant;
        } catch (\ValueError $valueError) {
            throw new \InvalidArgumentException(
                message: sprintf('The variant "%s" is not valid. Valid values are: %s', $variant, implode(', ', array_map(static fn (Variant $variant): string => $variant->value, Variant::cases()))),
                code: $valueError->getCode(),
                previous: $valueError
            );
        }
    }

    #[PostMount]
    public function validate(): void
    {
        if ($this->subtitle && null === $this->title) {
            throw new \InvalidArgumentException('Title must be set if a subtitle is defined!');
        }
    }

    public function getDefaultCssClass(): string
    {
        $cssClass = 'card';

        if (null !== $this->variant) {
            $cssClass .= sprintf(' text-bg-%s', $this->variant->value);
        }

        return $cssClass;
    }
}
