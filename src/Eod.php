<?php

namespace RadicalLoop\Eod;

use RadicalLoop\Eod\Api\Calendar;
use RadicalLoop\Eod\Api\Exchange;
use RadicalLoop\Eod\Api\Stock;

class Eod
{
    /**
     * Config class variable
     *
     * @var Config
     */
    protected $config;

    /**
     * constructor
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * factory method for creating api object
     *
     * @param string $name
     * @return EodClient
     */
    public function api(string $name)
    {
        $name = strtolower($name);
        switch ($name) {
            case 'exchange':
                $api = new Exchange($this->config);
                break;
            case 'stock':
                $api = new Stock($this->config);
                break;
            case 'calendar':
                $api = new Calendar($this->config);
                break;
            default:
                throw new \InvalidArgumentException(
                    sprintf('Undefined api instance called: "%s"', $name)
                );
        }
        return $api;
    }

    /**
     * magic method for creating fluent access
     *
     * @param string $name
     * @param array $arguments
     * @return EodClient
     */
    public function __call(string $name, array $arguments)
    {
        try {
            return $this->api($name);
        } catch (\InvalidArgumentException $exception) {
            throw new \BadMethodCallException(
                sprintf('Undefined method called: "%s"', $name)
            );
        }
    }
}
