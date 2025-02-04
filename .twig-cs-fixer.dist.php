<?php

declare(strict_types=1);

$finder = new \TwigCsFixer\File\Finder();
$finder
    ->in(__DIR__ . '/templates')
;

$ruleset = new \TwigCsFixer\Ruleset\Ruleset();
$ruleset->addStandard(new \TwigCsFixer\Standard\TwigCsFixer());

$config = new \TwigCsFixer\Config\Config();
$config
    ->setRuleset($ruleset)
    ->setFinder($finder)
    ->setCacheFile(__DIR__ . '/var/cache/.twig-cs-fixer.cache')
;;

return $config;
