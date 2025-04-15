<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component\Dropdown;

final readonly class DropdownHeader implements DropdownItemInterface
{
    public function __construct(
        private string $label,
    ) {
    }

    /**
     * @return array<string, bool|string>
     */
    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'header' => true,
        ];
    }
}
