<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component\Dropdown;

interface DropdownItemInterface
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(): array;
}
