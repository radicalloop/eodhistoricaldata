<?php

namespace RadicalLoop\Eod\Api;

use GuzzleHttp\Exception\GuzzleException;
use RadicalLoop\Eod\Config;
use GuzzleHttp\Client as GuzzleHttpClient;

abstract class EodClient
{
    const DATA_TYPE_JSON = 'json';
    const DATA_TYPE_CSV = 'csv';

    /**
     * configuration
     *
     * @var RadicalLoop\Eod\Config
     */
    protected $config;

    /**
     * GuzzleHttp client
     *
     * @var GuzzleHttp\Client
     */
    protected $client;

    /**
     * url segment which added in base api path
     *
     * @var string
     */
    protected $urlSegment = '';

    /**
     * EodClient constructor
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->client = new GuzzleHttpClient();
    }

    /**
     * get api uri
     *
     * @return string
     */
    public function getApiUri(): string
    {
        return rtrim($this->config->getApiUrl(), '/') . $this->urlSegment;
    }

    /**
     * send request for api
     *
     * @param  string  $symbol
     * @param  array  $params
     * @return string|json
     * @throws GuzzleException
     */
    public function get(string|null $symbol, array $params = [])
    {
        $segment = $symbol ? ('/' . $symbol) : '';
        $httpQuery = http_build_query(array_merge($params, ['api_token' => $this->config->getApiToken()]));
        $response = $this->client->get($this->getApiUri() . $segment . '?' . $httpQuery);
        return $response->getBody()->getContents();
    }
}
