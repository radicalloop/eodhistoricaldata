<?php

namespace RadicalLoop\Eod\Api;

use RadicalLoop\Eod\Traits\Actionable;

class Calendar extends EodClient
{
    use Actionable;

    /**
     * url segment for calendar api
     *
     * @var string
     */
    protected $urlSegment = '';

    /**
     * Upcoming Earnings API
     * url : https://eodhd.com/financial-apis/calendar-upcoming-earnings-ipos-and-splits#Upcoming_Earnings_API
     *
     * @param  array  $params
     * @return Calendar
     */
    public function earnings($params = [])
    {
        $this->urlSegment = '/calendar/earnings';
        $this->setParams(null, $params);
        return $this;
    }


    /**
     * Earnings Trends API
     * url : https://eodhd.com/financial-apis/calendar-upcoming-earnings-ipos-and-splits#Earnings_Trends_API
     *
     * @param  array  $params
     * @return Calendar
     */
    public function trends($params = [])
    {
        $this->urlSegment = '/calendar/trends';
        $this->setParams(null, $params);
        return $this;
    }


    /**
     * Upcoming IPOs API
     * url : https://eodhd.com/financial-apis/calendar-upcoming-earnings-ipos-and-splits#Upcoming_IPOs_API
     *
     * @param  array  $params
     * @return Calendar
     */
    public function ipos($params = [])
    {
        $this->urlSegment = '/calendar/ipos';
        $this->setParams(null, $params);
        return $this;
    }

    /**
     * Upcoming Splits API
     * url : https://eodhd.com/financial-apis/calendar-upcoming-earnings-ipos-and-splits#Upcoming_Splits_API
     *
     * @param  array  $params
     * @return Calendar
     */
    public function splits($params = [])
    {
        $this->urlSegment = '/calendar/splits';
        $this->setParams(null, $params);
        return $this;
    }
}
