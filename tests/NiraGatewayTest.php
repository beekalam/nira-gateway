<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\ClientBuilder;
use Beekalam\NiraGateway\NiraGateway;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class NiraGatewayTest extends TestCase
{
    private $client;


    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new ClientBuilder('user', 'pass');
        $this->client->setTesting(true);
    }

    private function is_json($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    private function assertISJson($string)
    {
        $this->assertTrue($this->is_json($string));
    }


    // /** @test */
    public function true_is_true()
    {
        $ng = new NiraGateway($this->client);
        $this->assertNotNull($ng);
    }

    /** @test */
    public function can_search_flights()
    {
        $this->client->setMock(new MockHandler([
            new Response(200, [], '{"AvailableFlights":
            [{"DepartureDateTime":"2020-08-01 21:00:00",
            "OperatingFlightNo":"1000","Airline":"PA","ArrivalDateTime":"2020-08-01 22:00:00",
            "AdultTotalPrices":"Z:1140000 L:1140000 G:1352000","OperatingAirline":"PA","Origin":"UGT",
            "FlightNo":1000,"AircraftTypeName":"Foker 100","Destination":"TTQ",
            "ClassRefundStatus":"Z:Refundable L:Refundable G:Refundable",
            "ClassesStatus":"/ZA LA GC","AircraftTypeCode":"100"}]}'
            ),
        ]));
        $ng = new NiraGateway($this->client);
        $options = [
            'airline'     => 'PA',
            'cbSource'    => 'ugt',
            'cbTarget'    => 'ttq',
            'cbDay1'      => '3',
            'cbMonth1'    => '06',
            'cbAdultQty'  => '1',
            'cbInfantQty' => '0',
        ];

        $res = $ng->search($options);
        $this->assertISJson($res);
    }

    /** @test */
    function client_builder_should_return_mock_requests()
    {
        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar'], 'Hello, World'),
            new Response(202, ['Content-Length' => 0]),
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        ]);
        $response = $this->client->setMock($mock)
                                 ->getClient()
                                 ->request('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Hello, World', $response->getBody());
    }

}
