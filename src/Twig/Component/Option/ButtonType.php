<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component\Option;

enum ButtonType: string
{
    case BUTTON = 'button';
    case SUBMIT = 'submit';
    case RESET = 'reset';
}
