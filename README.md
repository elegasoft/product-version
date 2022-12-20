# Laravel Product Version Bumper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/elegasoft/product-version.svg?style=flat-square)](https://packagist.org/packages/elegasoft/product-version)
[![Total Downloads](https://img.shields.io/packagist/dt/elegasoft/product-version.svg?style=flat-square)](https://packagist.org/packages/elegasoft/product-version)
![GitHub Actions](https://github.com/elegasoft/product-version/actions/workflows/main.yml/badge.svg)

A package to display the latest git tag version and will also allow you to easily and/or programmatically bump the
major,
minor and patch tags for the repository.

```bash
# Basic Semver Looks Like:
{major}.{minor}.{patch}
```

## Installation

You can install the package via composer:

```bash
composer require elegasoft/product-version
```

## Usage (Command Line/Console)

To see the current semver version of the repository

```bash
php artisan product-version:current

# Output Example: v1.0.3-125-0ca4a7187
```

The default is to bump the patch version of the semver

```bash
# Starting with: v1.0.3-125-0ca4a7187

php artisan product-version:bump

# Output Example: v1.0.4-125-0ca4a7187
```

To bump the major semver version of the repository

```bash
# Starting with: v1.0.3-125-0ca4a7187

php artisan product-version:bump --major

# Output Example: v2.0.0-125-0ca4a7187
```

To bump the minor semver version of the repository

```bash
# Starting with: v1.0.3-125-0ca4a7187

php artisan product-version:bump --minor

# Output Example: v1.1.0-125-0ca4a7187
```

## Usage (Programmatic)

To see the current semver version of the repository

```php
ProductVersion::current(); 

// Output Example: v1.0.3-125-0ca4a7187
```

The default is to bump the patch version of the semver

```php
// Starting w: v1.0.3-125-0ca4a7187

ProductVersion::bump(); 

// Output Example: v1.0.4-125-0ca4a7187
```

To bump the major semver version of the repository

```php
// Starting w: v1.0.3-125-0ca4a7187

ProductVersion::bump($major = true, $minor = false); 

// Output Example: v2.0.0-125-0ca4a7187
```

To bump the minor semver version of the repository

```php
// Starting w: v1.0.3-125-0ca4a7187

ProductVersion::bump($major = false, $minor = true); 

// Output Example: v1.1.0-125-0ca4a7187
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email jason@elegasoft.com instead of using the issue tracker.

## Credits

- [Jason Cook](https://github.com/elegasoft)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
