# EOD Historical Data API Client Wrapper for Laravel/PHP

[![Build Status](https://travis-ci.org/radicalloop/eodhistoricaldata.svg?branch=master)](https://travis-ci.org/radicalloop/eodhistoricaldata)

## Installation
To install this package via the `composer require` command:

```bash
$ composer require radicalloop/eodhistoricaldata
```
Or add it to `composer.json` manually:

```json
"require": {
    "radicalloop/eodhistoricaldata": "~1.0"
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
$stock = Eod::stock();

// JSON 
$stock->realTime('AAPL.US')->json();
$stock->eod('AAPL.US')->json();

// CSV 
$stock->realTime('AAPL.US')->csv();
$stock->eod('AAPL.US')->csv();

// Save CSV to specific path
$stock->realTime('AAPL.US')->save('path/to/save/csv/stock.csv');

// For other parameters, for ex. dividend api with other params
$stock->div('AAPL.US', ['from' => '2017-01-01'])->json();
```
To check other Stock API usages, refer [Test Cases](tests/StockTest.php) here.

### Exchanges API
```php
$exchange = Eod::exchange();

// JSON 
$exchange->symbol('US')->json();
$exchange->multipleTicker('US')->json();

// CSV 
$exchange->symbol('US')->csv();
$exchange->multipleTicker('US')->csv();

// Save CSV to specific path
$exchange->symbol('US')->save('path/to/save/csv/stock.csv');
```
To check other Exchanges API usages, refer [Test Cases](tests/ExchangeTest.php) here.



