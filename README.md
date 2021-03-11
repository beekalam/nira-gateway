# Helper classes to connect to Nira Rerservation API.

Helper class to connect to Nira API.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/beekalam/nira-gateway.svg?style=flat-square)](https://packagist.org/packages/beekalam/nira-gateway)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/beekalam/nira-gateway/run-tests?label=tests)](https://github.com/beekalam/nira-gateway/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/beekalam/nira-gateway.svg?style=flat-square)](https://packagist.org/packages/beekalam/nira-gateway)
[![Build Status](https://travis-ci.com/beekalam/nira-gateway.svg?branch=main)](https://travis-ci.com/beekalam/nira-gateway)
[![StyleCI](https://github.styleci.io/repos/332401677/shield?branch=main)](https://github.styleci.io/repos/332401677?branch=main)

## Installation

You can install the package via composer:

```bash
composer require beekalam/nira-gateway
```

## Usage

* Initializing the gateway handler.

```php
$ngs = new NiraGatewaySpecification("<domain>/ws1", "<domain>/ws2/cgi-bin/NRSWEB.cgi", '<username>', '<password>');
$ng = new NiraGateway($ngs);
```

### searching

```php
$searchParameters = ParameterBuilder::fromArray([
        'airline' => '<your_airline>',
        'cbSource' => 'SYZ' 
        'cbTarget' => 'THR',
        'cbDay1' => '1',
        'cbMonth1' => '12'
        'cbAdultQty' => '1'
        'cbInfantQty' => '1'
        'cbChildQty' => '0'
]);

$responseBody = $ng->search($searchParameters);
FlightParser::fromJson($responseBody);
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
