<?php

declare(strict_types=1);

namespace Codeschubser\Bundle\TwigComponents;

use Symfony\Component\HttpKernel\Bundle\Bundle;

final class CodeschubserTwigComponentsBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
