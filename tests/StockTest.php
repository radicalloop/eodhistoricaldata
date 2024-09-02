<?php
use PHPUnit\Framework\TestCase;
use RadicalLoop\Eod\Config;
use RadicalLoop\Eod\Eod;
use Dotenv\Dotenv;

class StockTest extends TestCase
{
    protected $stock;

    protected function setUp(): void
    {
        parent::setUp();
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();
        $apiToken = $_ENV['API_TOKEN'];
        $this->stock = (new Eod(new Config($apiToken)))->stock();
    }

    public function test_realtime_api()
    {
        $content = $this->stock->realTime('AAPL.US')->json();
        $this->assertNotEmpty($content);
    }

    public function test_fundamental_data_api()
    {
        $content = $this->stock->fundamental('AAPL.US')->json();
        $this->assertNotEmpty($content);
    }

    public function test_dividend_api()
    {
        $content = $this->stock->dividend('AAPL.US')->json();
        $this->assertNotEmpty($content);
    }

    public function test_splits_api()
    {
        $content = $this->stock->splits('AAPL.US')->json();
        $this->assertNotEmpty($content);
    }

    public function test_eod_api()
    {
        $content = $this->stock->eod('AAPL.US')->json();
        $this->assertNotEmpty($content);
    }

    public function test_yahoo_api()
    {
        $content = $this->stock->yahoo('AAPL.US')->json();
        $this->assertNotEmpty($content);
    }

    public function test_search_api()
    {
        $content = $this->stock->search('AAPL.US')->json();
        $this->assertNotEmpty($content);
    }

    public function test_search_api_filters_exchange()
    {

        $content = $this->stock->search('AAPL.US', ['exchange'=>'NASDAQ'])->json();
        $this->assertNotEmpty($content);
    }
}
