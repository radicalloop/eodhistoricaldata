<?php

namespace RadicalLoop\Eod\Api;

use RadicalLoop\Eod\Traits\Actionable;

class Exchange extends EodClient
{
    use Actionable;

    /**
     * url segment for exchange api
     *
     * @var string
     */
    protected $urlSegment = '/exchanges';

    /**
     * Set Get Exchange Symbols api
     * url : https://eodhistoricaldata.com/knowledgebase/list-symbols-exchange/
     *
     * @param  string  $symbol
     * @param  array  $params
     * @return Exchange
     */
    public function symbol($symbol, $params = [])
    {
        $this->setParams($symbol, $params);

        return $this;
    }

    /**
     * Set Multiple Tickers api
     * url: https://eodhistoricaldata.com/knowledgebase/multiple-tickers-download/
     *
     * @param  string  $symbol
     * @param  array  $params
     * @return Exchange
     */
    public function multipleTicker($symbol, $params = [])
    {
        $this->urlSegment = '/eod-bulk-last-day';
        $this->setParams($symbol, $params);

        return $this;
    }

    /**
     * Get exchange details api
     * url: https://eodhistoricaldata.com/financial-apis/exchanges-api-trading-hours-and-holidays/
     *
     * @param  string  $symbol
     * @param  array  $params
     * @return Exchange
     */
    public function details($symbol, $params = [])
    {
        $this->urlSegment = '/exchange-details';
        $this->setParams($symbol, $params);

        return $this;
    }

    /**
     * Get the full list of supported exchanges symbols with names, codes, operating MICs, country, and currency
     * url: https://eodhd.com/financial-apis/exchanges-api-list-of-tickers-and-trading-hours
     */
    public function list(string $exchange, array $params = []): self
    {
        $this->urlSegment = '/exchange-symbol-list';
        $this->setParams($exchange, $params);

        return $this;
    }

    /**
     * Get the list of inactive (delisted) tickers from an exchange
     * url: https://eodhd.com/financial-apis/delisted-stock-companies-data
     */
    public function delisted(string $exchange, array $params = []): self
    {
        $this->urlSegment = '/exchange-symbol-list';

        $params = array_merge($params, ['delisted' => 1]);

        $this->setParams($exchange, $params);

        return $this;
    }
}
