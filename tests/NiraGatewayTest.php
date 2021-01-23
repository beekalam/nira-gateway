<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\ClientBuilder;
use Beekalam\NiraGateway\NiraGateway;
use Beekalam\NiraGateway\ParameterBuilder;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class NiraGatewayTest extends TestCase
{

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

    private function getFareResults()
    {
        return <<<'JSON'
{
    "AdultTotalPrice": "1140000",
    "InfantTotalPrice": "176000",
    "EligibilityText": "",
    "CRCNRules": "از 3 ساعت مانده به پرواز,50,P/از 24 ساعت مانده به پرواز تا 3 ساعت مانده به پرواز,40,P/از لحظه صدور تا 24 ساعت مانده به پرواز,30,P/",
    "InfantFare": "100000",
    "AdultTaxes": "I6:10000.0,EN_Desc:PASSENGER SAFETY OVERSIGHT SERVICE,FA_Desc:PASSENGER SAFETY OVERSIGHT SERVICE$KU:60000.0,EN_Desc:MUNICIPALITI TAX,FA_Desc:شهرداري$LP:70000.0,EN_Desc:AIRPORT TAX,FA_Desc:فرودگاهي$",
    "ChildFare": "500000",
    "AdultFare": "1000000",
    "ChildTaxes": "I6:10000.0,EN_Desc:PASSENGER SAFETY OVERSIGHT SERVICE,FA_Desc:PASSENGER SAFETY OVERSIGHT SERVICE$KU:30000.0,EN_Desc:MUNICIPALITI TAX,FA_Desc:شهرداري$LP:70000.0,EN_Desc:AIRPORT TAX,FA_Desc:فرودگاهي$",
    "InfantTaxes": "KU:6000.0,EN_Desc:MUNICIPALITI TAX,FA_Desc:شهرداري$LP:70000.0,EN_Desc:AIRPORT TAX,FA_Desc:فرودگاهي$",
    "AdultComission": "0",
    "ChildTotalPrice": "610000"
}
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

        $sb = new ParameterBuilder();
        $sb->setAirline('PA')
           ->setSource('ugt')
           ->setTarget('ttq')
           ->setDay('3')
           ->setMonth('06')
           ->setAdultCount('1')
           ->setInfantCount('0');


        $res = $ng->search($sb);
        $this->assertISJson($res);
    }

    /** @test */
    function can_get_fare_results()
    {
        $mock = new MockHandler([
            new Response(200, [], $this->getFareResults()),
        ]);
        $ng = new NiraGateway('user', 'pass');
        $ng->setTesting(true)
           ->setMock($mock);

        $options = [
            'Airline'       => 'PA',
            'Route'         => 'ugt',
            'RBD'           => 'ttq',
            'DepartureDate' => '3',
            'FlightNo'      => '10',
        ];

        $res = $ng->search($options);
        $this->assertISJson($res->getContents());
    }


}
