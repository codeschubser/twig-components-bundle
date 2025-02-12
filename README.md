# Twig Components Bundle (experimental)

[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/codeschubser/twig-components-bundle/ci.yml)](https://github.com/codeschubser/twig-components-bundle/actions/workflows/ci.yml)
[![GitHub Tag](https://img.shields.io/github/v/tag/codeschubser/twig-components-bundle)](https://github.com/codeschubser/twig-components-bundle/tags)
[![codecov](https://codecov.io/gh/codeschubser/twig-components-bundle/branch/master/graph/badge.svg?token=6303H9T6XZ)](https://codecov.io/gh/codeschubser/twig-components-bundle)
[![GitHub License](https://img.shields.io/github/license/codeschubser/twig-components-bundle)](https://github.com/codeschubser/twig-components-bundle/blob/master/LICENSE)

> [!WARNING]  
> This Bundle is experimental and subject to change in a future release.

A Symfony bundle for the [Twig Components](https://symfony.com/bundles/ux-twig-component/current/index.html) library.

This bundle allows you to create robust and reusable Twig components.

## Requirements

- PHP 8.2 or higher
- Symfony 6.4 or higher

## Features

All components are [Bootstrap](https://getbootstrap.com/) ready. Recommend version is v5.3 or higher. Some components can be extended with icons. [Bootstrap Icons](https://icons.getbootstrap.com/) and [Font Awesome](https://fontawesome.com/) were tested. But other icons are also possible.

## Accessibility

- Optional icons are hidden from the [accessibility API](https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Attributes/aria-hidden).
- Alerts are decorated with `role="alert"` to send accessible alert event to assistive technology products.
- Dropdowns are decorated with `aria-expanded` and `aria-current`.
- Icons in components are decorated with `aria-hidden`.

## Usage

- [Installation](docs/index.md)
- Components
  - [Alert](docs/alert.md) *Provide contextual feedback messages for typical user actions with the handful of available and flexible options.*
  - [Button](docs/button.md) *Provide buttons with support for multiple variants, icon, states, and more.*
  - [Card](docs/cards.md) *Provide flexible content containers.*
  - [Dropdown](docs/dropdown.md) *Toggleable and contextual overlays.*
  - Modal *TBD*
  - Toast *TBD*

## Development

TBD

## License

This bundle is licensed under the [MIT License](LICENSE).
