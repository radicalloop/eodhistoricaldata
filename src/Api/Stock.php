<?php

namespace RadicalLoop\Eod\Api;

use RadicalLoop\Eod\Traits\Actionable;

class Stock extends EodClient
{
    use Actionable;

    /**
     * Live/Realtime Stock Prices API
     * url: https://eodhistoricaldata.com/knowledgebase/live-realtime-stocks-api/
     * @param string $symbol
     * @param array $params
     * @return Stock
     */
    public function realTime($symbol, $params = [])
    {
        $this->urlSegment = '/real-time';
        $this->setParams($symbol, $params);
        return $this;
    }

    /**
    * Stock and ETFs Fundamental Data
    * url: https://eodhistoricaldata.com/knowledgebase/stock-etfs-fundamental-data-feeds/
    * @param string $symbol
    * @param array $params
    * @return Stock
    */
    public function fundamental($symbol, $params = [])
    {
        $this->urlSegment = '/fundamentals';
        $this->setParams($symbol, $params);
        return $this;
    }

    /**
    * Get Share Dividends
    * url: https://eodhistoricaldata.com/knowledgebase/api-splits-dividends/
    * @param string $symbol
    * @param array $params
    * @return Stock
    */
    public function dividend($symbol, $params = [])
    {
        $this->urlSegment = '/div';
        $this->setParams($symbol, $params);
        return $this;
    }

    /**
    * Get Share Splits
    * url: https://eodhistoricaldata.com/knowledgebase/api-splits-dividends/
    * @param string $symbol
    * @param array $params
    * @return Stock
    */
    public function splits($symbol, $params = [])
    {
        $this->urlSegment = '/splits';
        $this->setParams($symbol, $params);
        return $this;
    }

    /**
    * Stock Price Data API (End-Of-Day)
    * url: https://eodhistoricaldata.com/knowledgebase/api-for-historical-data-and-volumes/
    * @param string $symbol
    * @param array $params
    * @return Stock
    */
    public function eod($symbol, $params = [])
    {
        $this->urlSegment = '/eod';
        $this->setParams($symbol, $params);
        return $this;
    }

    /**
    * Technical Indicator API
    * url: https://eodhistoricaldata.com/financial-apis/technical-indicators-api/
    * @param string $symbol
    * @param array $params
    * @return Stock
    */
    public function technical($symbol, $params = [])
    {
        $this->urlSegment = '/technical';
        $this->setParams($symbol, $params);
        return $this;
    }

    /**
    * Yahoo Finance API Support
    * url: https://eodhistoricaldata.com/knowledgebase/api-for-historical-data-and-volumes/
    * @param string $symbol
    * @param array $params
    * @return Stock
    */
    public function yahoo($symbol, $params = [])
    {
        $params = array_merge($params, ['s' => $symbol]);
        $this->urlSegment = '/table.csv';
        $this->setParams(null, $params);
        return $this;
    }

    /**
     * Search API for Stocks, ETFs, Mutual Funds and Indices
     * url: https://eodhistoricaldata.com/financial-apis/search-api-for-stocks-etfs-mutual-funds-and-indices/
     * @param string $symbol
     * @param array $params
     * @return Stock
     */
    public function search($symbol, $params = [])
    {
        $this->urlSegment = '/search';
        $this->setParams($symbol, $params);
        return $this;
    }
}
