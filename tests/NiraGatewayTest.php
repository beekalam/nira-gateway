<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\ClientBuilder;
use Beekalam\NiraGateway\NiraGateway;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class NiraGatewayTest extends TestCase
{
    private $client;


    protected function setUp(): void
    {
        parent::setUp();
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


    private function getSearchResults()
    {
        return <<<JSON
{"AvailableFlights":
            [{"DepartureDateTime":"2020-08-01 21:00:00",
            "OperatingFlightNo":"1000","Airline":"PA","ArrivalDateTime":"2020-08-01 22:00:00",
            "AdultTotalPrices":"Z:1140000 L:1140000 G:1352000","OperatingAirline":"PA","Origin":"UGT",
            "FlightNo":1000,"AircraftTypeName":"Foker 100","Destination":"TTQ",
            "ClassRefundStatus":"Z:Refundable L:Refundable G:Refundable",
            "ClassesStatus":"/ZA LA GC","AircraftTypeCode":"100"}]}
JSON;
    }

    /** @test */
    public function can_search_flights()
    {
        $mock = new MockHandler([
            new Response(200, [], $this->getSearchResults()),
        ]);
        $ng = new NiraGateway('user', 'pass');
        $ng->setMock($mock)
           ->setTesting(true);

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
    function can_search_flights2()
    {
        $mock = new MockHandler([
            new Response(200, [], $this->getSearchResults()),
        ]);
        $ng = new NiraGateway('user', 'pass');
        $ng->setTesting(true)
           ->setMock($mock);

        $options = [
            'Airline'     => 'PA',
            'cbSource'    => 'ugt',
            'cbTarget'    => 'ttq',
            'cbDay1'      => '3',
            'cbMonth1'    => '10',
            'cbAdultQty'  => '1',
            'cbInfantQty' => '0',
        ];

        $res = $ng->search($options);
        var_dump($res->getContents());
    }


}
