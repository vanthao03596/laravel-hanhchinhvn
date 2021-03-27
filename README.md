# Phân cấp hành chính Việt Nam cho Laravel

Laravel hcvn contain all cities, districts, wards in vietnam 

[(Chú ý: Huyện Lý Sơn tỉnh Quảng Ngãi hiện chỉ còn cấp Huyện không có cấp xã )](https://vov.vn/chinh-tri/huyen-ly-son-tinh-quang-ngai-khong-con-don-vi-hanh-chinh-cap-xa-1026812.vov)
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
use Vanthao03596\HCVN\Models\Province;
use Vanthao03596\HCVN\Models\District;
use Vanthao03596\HCVN\Models\Ward;

$cities = Province::get();
$districts = District::get();
$wards = Ward::get();
```
Get data via relationship

```php
use Vanthao03596\HCVN\Models\Province;

$city = Province::first();
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
