<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\BootstrapTwigComponentsBundle\Twig\Component;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'Icon', template: '@BootstrapTwigComponents/components/Icon.html.twig', exposePublicProps: false)]
final class Icon
{
    public string $name;

    public function isUxIcon(): bool
    {
        return str_contains($this->name, ':');
    }
}
