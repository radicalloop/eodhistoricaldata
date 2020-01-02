<?php
use PHPUnit\Framework\TestCase;
use RadicalLoop\Eod\Config;
use RadicalLoop\Eod\Api\Exchange;
use RadicalLoop\Eod\Eod;
use RadicalLoop\Eod\Api\Stock;

class EodTest extends TestCase
{
    protected $client;

    protected function setUp(): void
    {
        parent::setUp();
        $apiToken = 'apitoken';
        $this->client = new Eod(new Config($apiToken));
    }

    /** @test **/
    public function check_instance_of_exchange()
    {
        $exchange = $this->client->exchange();
        $this->assertInstanceOf(Exchange::class, $exchange);

        $exchange = $this->client->api('exchange');
        $this->assertInstanceOf(Exchange::class, $exchange);
    }

    /** @test **/
    public function magic_call_exception()
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage('Undefined method called: "foo"');
        $this->client->foo();
    }

    /** @test **/
    public function api_function_call_exception()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Undefined api instance called: "bar"');

        $this->client->api('bar');
    }

    /** @test **/
    public function check_instance_of_stock()
    {
        $stock = $this->client->stock();
        $this->assertInstanceOf(Stock::class, $stock);

        $stock = $this->client->api('stock');
        $this->assertInstanceOf(Stock::class, $stock);
    }
}
