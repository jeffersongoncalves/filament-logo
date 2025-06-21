<div class="filament-hidden">

![Filament Logo](https://raw.githubusercontent.com/jeffersongoncalves/filament-logo/2.x/art/jeffersongoncalves-filament-logo.png)

</div>

# Filament Logo

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-logo.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-logo)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-logo/fix-php-code-style-issues.yml?branch=master&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-logo/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3A1.x)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-logo.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-logo)

## Description

A simple yet effective Filament plugin that automatically adds the Filament logo to your admin panel. This plugin enhances your Filament panel's user experience by displaying the logo in strategic locations:

- On mobile devices, the logo appears at the top of the panel

This provides consistent branding and navigation across different screen sizes, with zero configuration required.

## Installation

You can install the package via composer:

```bash
composer require jeffersongoncalves/filament-logo:^2.0
```

## Usage

This package automatically adds the Filament logo to your panel in two different scenarios:

1. **Mobile View**: The logo appears at the top of the panel on mobile devices using `PanelsRenderHook::TOPBAR_BEFORE`.

No additional configuration is required. The package works out of the box after installation.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jèfferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
