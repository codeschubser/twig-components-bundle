# Installation

Run the following command to install:

```shell
$ composer require codeschubser/twig-components-bundle
```

If you use `Symfony Flex` in your application, you are ready.
Otherwise, keep reading because you need to perform some manual configuration.

## Manual Configuration for Applications Not Using Symfony Flex

In most Symfony applications **you don't need to make any of the following changes**.
These steps are only required for applications that have opted not to use Symfony Flex.

First, register two bundles in your application. Edit the `config/bundles.php`
file and add the following:

```php
return [
    // ...
    Codeschubser\Bundle\TwigComponents\CodeschubserTwigComponentsBundle::class => ['all' => true],
    Symfony\UX\TwigComponent\TwigComponentBundle::class => ['all' => true],
];
```

That's all! You are now ready to use TwigComponents in you application.
