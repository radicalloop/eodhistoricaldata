<?php

namespace RadicalLoop\Eod;

class Config
{
    /**
     * Api key
     *
     * @var string
     */
    protected $apiToken;

    /**
     * Base api url
     *
     * @var string
     */
    protected $apiUrl = 'https://eodhistoricaldata.com/api/';

    /**
     * config constructor
     *
     * @param string $apiToken
     */
    public function __construct($apiToken)
    {
        $this->apiToken = $apiToken;
    }

    /**
     * returns api key
     *
     * @return string
     */
    public function getApiToken()
    {
        return $this->apiToken;
    }

    /**
     * set api key
     *
     * @param string $apiToken
     * @return string
     */
    public function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;
    }

    /**
     * returns base api url
     *
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * set base api url
     *
     * @param [type] $apiUrl
     * @return void
     */
    public function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }
}
