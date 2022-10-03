<h1 align="center">Laravel Num</h1>

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ageekdev/laravel-num.svg?style=flat-square)](https://packagist.org/packages/ageekdev/laravel-num)
[![Laravel 8.x](https://img.shields.io/badge/Laravel-8.x-red.svg?style=flat-square)](http://laravel.com)
[![Laravel 9.x](https://img.shields.io/badge/Laravel-9.x-red.svg?style=flat-square)](http://laravel.com)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ageekdev/laravel-num/run-tests?label=tests&style=flat-square)](https://github.com/ageekdev/laravel-num/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ageekdev/laravel-num.svg?style=flat-square)](https://packagist.org/packages/ageekdev/laravel-num)

To convert the unicode digit to another unicode digit.

## Supported languages

By default, You can convert english, myanmar and thai numbers.
If you would like to add more, you can add `zero unicode characters` at config/num.php.
You can see more `zero unicode character` at [zero-unicode.md](zero-unicode.md).

## Installation
You can install this package via composer using this command:

```bash
composer require ageekdev/laravel-num
```

The package will automatically register itself.

Publish configuration and asset files
```bash
php artisan vendor:publish --provider="AgeekDev\Num\NumServiceProvider"
```

## Usage
### Using the facade

**Direct convert from the english number to the myanmar number**
```php
Num::convert('1234๑๒๓๔','mm','en'); 
// ၁၂၃၄๑๒๓๔
```
___

**Convert to the myanmar number**
```php
Num::toMyanmar('1234๑๒๓๔'); 
// ၁၂၃၄၁၂၃၄
```
___
**Convert to the thai number**
```php
Num::toThai('1234'); 
// ๑๒๓๔
```
___
**Convert to the english number**
```php
Num::toEnglish('၁၂၃၄'); 
// 1234
```

### Using with Helpers

**Convert to the myanmar number**
```php
num_to_mm('1234'); 
// ၁၂၃၄
```
___
**Convert to the thai number**
```php
num_to_th('1234');
// ๑๒๓๔
```
___
**Convert to the english number**
```php
num_to_eng('၁၂၃၄');
// 1234
```

## Macro

The Laravel Num allows you to define "macros", which can serve as a fluent, expressive mechanism to configure string, to language and from language when interacting with services throughout your application. 
To get started, you may define the macro within the boot method of your application's App\Providers\AppServiceProvider class:

```php
use AgeekDev\Num\Facades\Num;
 
/**
 * Bootstrap any application services.
 *
 * @return void
 */
public function boot()
{
    Num::macro('toMyanmarShan', function (int|string $string, string $from = null) {
        return Num::convert($string, 'shan', $from);
    });
}
```

Once your macro has been configured, you may invoke it from anywhere in your application to convert numbers with the specified configuration:

```php
$numbers = Num::toMyanmarShan('1234567890');

// ႑႒႓႔႕႖႗႘႙႐
```

**Note**
If convert language don't have in num.php, you may configure this language in your num configuration file.
```php
'zeros' => [
    'en' => 0,
    'mm' => '၀',
    'th' => '๐',
    'shan' => '႐'
],
```

## Testing

You can run the tests with:

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
