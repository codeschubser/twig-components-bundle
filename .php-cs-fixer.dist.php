<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
;

$config = new PhpCsFixer\Config();

return $config
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'linebreak_after_opening_tag' => true,
        'no_unused_imports' => true,
        'trailing_comma_in_multiline' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'phpdoc_order' => true,
        'blank_line_between_import_groups' => false,
        'ordered_class_elements' => true,
    ])
    ->setFinder($finder)
    ->setCacheFile(__DIR__ . '/var/cache/.php-cs-fixer.cache')
;
