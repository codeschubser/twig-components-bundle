<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component\Option;

interface VariantInterface
{
    public function getDefaultCssClass(): string;
}
