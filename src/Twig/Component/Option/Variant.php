<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component\Option;

enum Variant: string
{
    case PRIMARY = 'primary';
    case SECONDARY = 'secondary';
    case INFO = 'info';
    case SUCCESS = 'success';
    case WARNING = 'warning';
    case DANGER = 'danger';
    case LIGHT = 'light';
    case DARK = 'dark';
}
