# Laravel ZIP file validator

[![Latest Stable Version](https://poser.pugx.org/orkhanahmadov/laravel-zip-validator/v/stable)](https://packagist.org/packages/orkhanahmadov/laravel-zip-validator)
[![Latest Unstable Version](https://poser.pugx.org/orkhanahmadov/laravel-zip-validator/v/unstable)](https://packagist.org/packages/orkhanahmadov/laravel-zip-validator)
[![Total Downloads](https://img.shields.io/packagist/dt/orkhanahmadov/laravel-zip-validator)](https://packagist.org/packages/orkhanahmadov/laravel-zip-validator)
[![GitHub license](https://img.shields.io/github/license/orkhanahmadov/laravel-zip-validator.svg)](https://github.com/orkhanahmadov/laravel-zip-validator/blob/master/LICENSE.md)

[![Build Status](https://travis-ci.org/orkhanahmadov/laravel-zip-validator.svg?branch=master)](https://travis-ci.org/orkhanahmadov/laravel-zip-validator)
[![Test Coverage](https://api.codeclimate.com/v1/badges/588a51182465fa590e49/test_coverage)](https://codeclimate.com/github/orkhanahmadov/laravel-zip-validator/test_coverage)
[![Maintainability](https://api.codeclimate.com/v1/badges/588a51182465fa590e49/maintainability)](https://codeclimate.com/github/orkhanahmadov/laravel-zip-validator/maintainability)
[![Quality Score](https://img.shields.io/scrutinizer/g/orkhanahmadov/laravel-zip-validator.svg)](https://scrutinizer-ci.com/g/orkhanahmadov/laravel-zip-validator)
[![StyleCI](https://github.styleci.io/repos/232924943/shield?branch=master)](https://github.styleci.io/repos/232924943)

Laravel validation rule for checking ZIP file content.

## Requirements

- Laravel **5.8.** or **^6.0** or higher
- PHP **7.2** or higher.

## Installation

You can install the package via composer:

```bash
composer require orkhanahmadov/laravel-zip-validator
```

## Usage

Use `Orkhanahmadov\LaravelZipValidator\Rules\ZipContent` rule with list of required files.

``` php
use Orkhanahmadov\LaravelZipValidator\Rules\ZipContent;

public function rules()
{
    return [
        'file' => ['required', 'file', 'mimes:zip', new ZipContent(['thumb.jpg', 'assets/logo.png'])],
    ];
}
```

Constructor accepts single argument:
- `files` - list of required files inside ZIP archive.
You can pass files as different constructor arguments or as array.
If files are nested inside folders, pass relative path to file.

Validator will fail if any of the passed files does not exist in ZIP archive.

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email ahmadov90@gmail.com instead of using the issue tracker.

## Credits

- [Orkhan Ahmadov](https://github.com/orkhanahmadov)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## TODO

- File size validation
- Wildcard validation
- Extension validation
- "OR" validation
