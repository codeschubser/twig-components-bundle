<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component\Dropdown;

final readonly class DropdownItem implements DropdownItemInterface
{
    public function __construct(
        private string $label,
        private string $link,
        private string $target = '_self',
        private ?string $icon = null,
        private bool $isCurrent = false,
    ) {
    }

    /**
     * @return array<string, null|bool|string>
     */
    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'link' => $this->link,
            'target' => $this->target,
            'icon' => $this->icon,
            'current' => $this->isCurrent,
        ];
    }
}
