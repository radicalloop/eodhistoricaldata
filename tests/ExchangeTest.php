<?php
use PHPUnit\Framework\TestCase;
use RadicalLoop\Eod\Config;
use RadicalLoop\Eod\Eod;
use org\bovigo\vfs\vfsStream;

class ExchangeTest extends TestCase
{
    protected $exchange;   //comment
    private $root;

    protected function setUp(): void
    {
        parent::setUp();
        $this->root = vfsStream::setup('storage');
        $apiToken = getenv('API_TOKEN');
        $this->exchange = (new Eod(new Config($apiToken)))->exchange();
    }

    /** @test */
    public function url_endpoint()
    {
        $uri = $this->exchange->getApiUri();
        $this->assertSame('https://eodhistoricaldata.com/api/exchanges', $uri);
    }

    /** @test **/
    public function exchange_symbol()
    {
        $content = $this->exchange->symbol('US')->json();
        $data = json_decode($content, true);

        $this->assertTrue(is_array($data));
        $this->assertNotEmpty($data);

        $this->assertCount(6, $data[0]);

        $this->assertArrayHasKey('Code', $data[0]);
        $this->assertArrayHasKey('Name', $data[0]);
        $this->assertArrayHasKey('Country', $data[0]);
        $this->assertArrayHasKey('Exchange', $data[0]);
        $this->assertArrayHasKey('Currency', $data[0]);
        $this->assertArrayHasKey('Type', $data[0]);
    }

    /** @test **/
    public function multiple_ticker()
    {
        $content = $this->exchange->multipleTicker('US')->json();
        $data = json_decode($content, true);

        $this->assertTrue(is_array($data));
        $this->assertNotEmpty($data);

        $this->assertCount(9, $data[0]);

        $this->assertArrayHasKey('code', $data[0]);
        $this->assertArrayHasKey('exchange_short_name', $data[0]);
        $this->assertArrayHasKey('date', $data[0]);
        $this->assertArrayHasKey('open', $data[0]);
        $this->assertArrayHasKey('high', $data[0]);
        $this->assertArrayHasKey('low', $data[0]);
        $this->assertArrayHasKey('close', $data[0]);
        $this->assertArrayHasKey('adjusted_close', $data[0]);
        $this->assertArrayHasKey('volume', $data[0]);
    }

    /** @test */
    public function save_file()
    {
        $fileName = vfsStream::url('storage/test.csv');
        $response = $this->exchange->symbol('US')->save($fileName);
        $this->assertTrue($this->root->hasChild('test.csv'));

        $content = $this->root->getChild('test.csv')->getContent();
        $this->assertNotEmpty($content);
    }
}
