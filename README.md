# Bootstrap Twig Components Bundle (experimental)

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
- Symfony 6.0 or higher

## Features

All components are [Bootstrap](https://getbootstrap.com/) ready. Recommend version is v5.3 or higher. Some components can be extended with icons. [Bootstrap Icons](https://icons.getbootstrap.com/) and [Font Awesome](https://fontawesome.com/) were tested. But other icons are also possible.

## Accessibility

- Optional icons are hidden from the [accessibility API](https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Attributes/aria-hidden).
- Alerts are decorated with `role="alert"` to send accessible alert event to assistive technology products.
- Dropdowns are decorated with `aria-expanded` and `aria-current`.
- Icons in components are decorated with `aria-hidden` or `aria-label`.

## Usage

- [Installation](docs/index.md)
- Components
    - [x] [Alert](docs/alert.md) *Provide contextual feedback messages for typical user actions with a handful of available and flexible options.*
    - [x] [Button](docs/button.md) *Provide buttons with support for multiple variants, icon, states, and more.*
    - [x] [Breadcrumbs](docs/breadcrumbs.md) *Provide breadcrumb navigation with valid schema.org markup*
    - [x] [Card](docs/cards.md) *Provide flexible content containers.*
    - [x] [Dropdown](docs/dropdown.md) *Toggleable and contextual overlays.*
    - [x] [Icon](docs/icon.md) *Reusable icon component*
    - [ ] Modal *TBD*
    - [ ] Toast *TBD*

## Development

During development, composer provides a large number of user-specific scripts that are intended to ensure code quality, among other things. A list and the corresponding description can be called up via `composer list`. These scripts are also used in the Github workflows.

## Contributing

If you want to contribute to the project and make it better, your help is very welcome. For major changes, please open an issue first to discuss what you would like to change. Please make sure to update tests as appropriate.

## License

This bundle is licensed under the [MIT License](LICENSE).
