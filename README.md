# EOD Historical Data API Client Wrapper for Laravel/PHP

[![Build Status](https://travis-ci.org/radicalloop/eodhistoricaldata.svg?branch=master)](https://travis-ci.org/radicalloop/eodhistoricaldata)
[![Latest Stable Version](https://poser.pugx.org/radicalloop/eodhistoricaldata/v/stable)](https://packagist.org/packages/radicalloop/eodhistoricaldata)
[![Total Downloads](https://poser.pugx.org/radicalloop/eodhistoricaldata/downloads)](https://packagist.org/packages/radicalloop/eodhistoricaldata)
[![License](https://poser.pugx.org/radicalloop/eodhistoricaldata/license)](https://packagist.org/packages/radicalloop/eodhistoricaldata)

## Installation
To install this package via the `composer require` command:

```bash
$ composer require radicalloop/eodhistoricaldata
```
Or add it to `composer.json` manually:

For laravel 5, use "~1.0"

```json
"require": {
    "radicalloop/eodhistoricaldata": "~2.0"
}
```
## Laravel
No configuration required for Laravel >= 5.5+, It will use the auto-discovery function.

In Laravel <= 5.4 (or if you are not using auto-discovery) register the service provider by adding it to the `providers` key in `config/app.php`. Also register the facade by adding it to the `aliases` key in `config/app.php`.

```php
'providers' => [
    ...
    RadicalLoop\Eod\EodServiceProvider::class,
],

'aliases' => [
    ...
    'Eod' => RadicalLoop\Eod\Facades\Eod::class,
]
```
## Configuration

To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish --provider="RadicalLoop\Eod\EodServiceProvider"
```

This will create a `config/eod.php` file in your app that you can modify to set your configuration.

Set your Eod historical data API token in the file:

```bash
return [
    'api_token' => 'put your token here'
];
```

## Usage

Here you can see an example of just how simple this package is to use.

### Stocks API
```php
use Eod;

$stock = Eod::stock();

// JSON 
$stock->realTime('AAPL.US')->json();
$stock->eod('AAPL.US')->json();

// Download CSV 
$stock->realTime('AAPL.US' ['s' => ['VTI','EUR','FX']])->download();
$stock->eod('AAPL.US')->download();

// Save CSV to specific path
$stock->realTime('AAPL.US')->save('path/to/save/csv/stock.csv');

// For other parameters, for ex. dividend api with other params
$stock->dividend('AAPL.US', ['from' => '2017-01-01'])->json();
```
To check other Stock API usages, refer [Test Cases](tests/StockTest.php) here.

### Exchanges API
```php
use Eod;

$exchange = Eod::exchange();

// JSON 
$exchange->symbol('US')->json();
$exchange->multipleTicker('US')->json();
$exchange->details('US')->json();

// Download CSV 
$exchange->symbol('US')->download();
$exchange->multipleTicker('US')->download();

// Save CSV to specific path
$exchange->symbol('US')->save('path/to/save/csv/stock.csv');
```
To check other Exchanges API usages, refer [Test Cases](tests/ExchangeTest.php) here.

## PHP
For PHP you can create an object like below.

```php
use RadicalLoop\Eod\Config;
use RadicalLoop\Eod\Eod;

$stock    = (new Eod(new Config($apiToken)))->stock();
$exchange = (new Eod(new Config($apiToken)))->exchange();
```

## Support
Contact: [www.radicalloop.com](https://www.radicalloop.com) — hello@radicalloop.com


