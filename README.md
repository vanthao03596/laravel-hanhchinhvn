# Very short description of the package

Laravel hcvn contain all cities, districts, wards in vietnam 

## Installation

You can install the package via composer:

```bash
composer require vanthao03596/laravel-hanhchinhvn
```

## Usage

```bash
php artisan vendor:publish --provider="Vanthao03596\HCVN\HCVNServiceProvider"
php artisan migrate
php artisan hcvn:install
```

### Working with Models

Get all cities, districts, wards
```php
use Vanthao03596\HCVN\Models\City;
use Vanthao03596\HCVN\Models\District;
use Vanthao03596\HCVN\Models\Ward;

$cities = City::get();
$districts = District::get();
$wards = Ward::get();
```
Get data via relationship

```php
use Vanthao03596\HCVN\Models\City;

$city = City::first();
$districts = $city->districts;
$wards = $city->wards;
```

All data get from: [madnh/hanhchinhvn](https://github.com/madnh/hanhchinhvn)

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [PhamThao](https://github.com/PhamThao)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
