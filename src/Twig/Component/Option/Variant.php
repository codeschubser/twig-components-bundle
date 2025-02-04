<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\TwigComponents\Twig\Component\Option;

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

    /**
     * @return string[]
     */
    public function details(): array
    {
        return match ($this) {
            self::PRIMARY => [
                'name' => 'Primary',
                'value' => 'primary',
                'description' => 'Main theme color.',
            ],
            self::SECONDARY => [
                'name' => 'Secondary',
                'value' => 'secondary',
                'description' => 'Alternative theme color.',
            ],
            self::INFO => [
                'name' => 'Info',
                'value' => 'info',
                'description' => 'Theme color used for neutral and informative content.',
            ],
            self::SUCCESS => [
                'name' => 'Success',
                'value' => 'success',
                'description' => 'Theme color used for positive or successful actions and information.',
            ],
            self::WARNING => [
                'name' => 'Warning',
                'value' => 'warning',
                'description' => 'Theme color used for non-destructive warning messages.',
            ],
            self::DANGER => [
                'name' => 'Danger',
                'value' => 'danger',
                'description' => 'Theme color used for errors and dangerous actions.',
            ],
            self::LIGHT => [
                'name' => 'Light',
                'value' => 'light',
                'description' => 'Additional theme option for less contrasting colors.',
            ],
            self::DARK => [
                'name' => 'Dark',
                'value' => 'dark',
                'description' => 'Additional theme option for higher contrasting colors.',
            ],
        };
    }
}
