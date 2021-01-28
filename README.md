# Helper classes to connect to Nira Rerservation API.

Helper class to connect to Nira API.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/beekalam/nira-gateway.svg?style=flat-square)](https://packagist.org/packages/beekalam/nira-gateway)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/beekalam/nira-gateway/run-tests?label=tests)](https://github.com/beekalam/nira-gateway/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/beekalam/nira-gateway.svg?style=flat-square)](https://packagist.org/packages/beekalam/nira-gateway)


## Installation

You can install the package via composer:

```bash
composer require beekalam/nira-gateway
```

## Usage

* Getting search results
```php
$ng = new NiraGateway('user', 'pass');
$sb = new ParameterBuilder();
    $sb->setAirline('PA')
       ->setSource('ugt')
       ->setTarget('ttq')
       ->setDay('3')
       ->setMonth('06')
       ->setAdultCount('1')
       ->setInfantCount('0');

$res = $ng->search($sb);
```

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

- [Mohammad Reza mansouri](https://github.com/beekalam)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
