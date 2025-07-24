<?php

use PHPUnit\Framework\TestCase;
use RadicalLoop\Eod\Config;
use RadicalLoop\Eod\Eod;
use Dotenv\Dotenv;

class CalendarTest extends TestCase
{
    protected $calendar;

    protected function setUp(): void
    {
        parent::setUp();
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();
        $apiToken = $_ENV['API_TOKEN'];
        $this->calendar = (new Eod(new Config($apiToken)))->calendar();
    }

    public function test_upcoming_earnings_api()
    {
        $content = $this->calendar->earnings()->json();
        $this->assertNotEmpty($content);
    }

    public function test_earnings_trends_api()
    {
        $content = $this->calendar->trends(['symbols' => 'AAPL.US,GOOG.US'])->json();
        $this->assertNotEmpty($content);
    }

    public function test_upcoming_ipos_api()
    {
        $content = $this->calendar->ipos()->json();
        $this->assertNotEmpty($content);
    }

    public function test_upcoming_splits_api()
    {
        $content = $this->calendar->splits()->json();
        $this->assertNotEmpty($content);
    }
}
