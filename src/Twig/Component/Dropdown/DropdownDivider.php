<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component\Dropdown;

final class DropdownDivider implements DropdownItemInterface
{
    /**
     * @return array<string, bool>
     */
    public function toArray(): array
    {
        return [
            'divider' => true,
        ];
    }
}
