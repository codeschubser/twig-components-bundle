<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component;

use Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component\Dropdown\DropdownItemInterface;
use Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component\Option\Variant;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PostMount;

#[AsTwigComponent(name: 'Dropdown', template: '@BootstrapTwigComponents/components/Dropdown.html.twig', exposePublicProps: false)]
final class Dropdown
{
    public Variant $variant;
    public ?string $label = null;
    public ?string $icon = null;
    /**
     * @var list<array{label: string, link: string, target: string, icon: ?string}|array{header: true}|array{divider: true}|array{text: string}|DropdownItemInterface>
     */
    public array $items = [];
    public bool $isDropUp = false;
    public bool $isRightAligned = false;

    public function mount(string|Variant $variant = Variant::SECONDARY): void
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
    public function postMount(): void
    {
        if ([] === $this->items) {
            throw new \InvalidArgumentException('You must define at least one item');
        }
    }

    /**
     * @return list<array>
     */
    public function getItems(): array
    {
        return array_map(static fn (array|DropdownItemInterface $item): array => is_array($item) ? $item : $item->toArray(), $this->items);
    }
}
