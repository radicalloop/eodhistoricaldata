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
}
