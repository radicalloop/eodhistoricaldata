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
// JSON 
$stock = Eod::realTime('AAPL.US')->json();

// CSV 
$stock = Eod::realTime('AAPL.US')->csv();

// Save CSV at specific path
$stock = Eod::realTime('AAPL.US')->save('path/to/save/csv/stock.csv');
```


