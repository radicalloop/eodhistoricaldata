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
     * @param string $symbol
     * @param array $params
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
     * @param string $symbol
     * @param array $params
     * @return Exchange
     */
    public function multipleTicker($symbol, $params = [])
    {
        $this->urlSegment = '/eod-bulk-last-day';
        $this->setParams($symbol, $params);
        return $this;
    }
}
