<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component\Dropdown;

final readonly class DropdownText implements DropdownItemInterface
{
    public function __construct(
        private string $text,
    ) {
    }

    public function toArray(): array
    {
        return [
            'text' => $this->text,
        ];
    }
}
