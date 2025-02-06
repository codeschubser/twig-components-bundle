<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\TwigComponents\Twig\Component\Option;

enum ButtonType: string
{
    case BUTTON = 'button';
    case SUBMIT = 'submit';
    case RESET = 'reset';
}
