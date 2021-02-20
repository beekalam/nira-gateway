<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\FareParameterBuilder;
use Beekalam\NiraGateway\NiraGateway;
use Beekalam\NiraGateway\ParameterBuilder;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

class NiraGatewayTest extends BaseTestCase
{
    /** @test */
    function when_no_availability_uri_is_give_a_default_value_is_used()
    {
        $ng = new NiraGateway('user', 'pass');

        $this->assertNotEmpty($ng->getAvailabilityURI());
    }

    /** @test */
    function when_no_availability_fare_uri_is_given_a_default_value_is_used()
    {
        $ng = new NiraGateway('user', 'pass');

        $this->assertNotEmpty($ng->getAvailabilityFareURI());
    }

    /** @test */
    function when_no_fare_uri_is_given_a_default_value_is_used()
    {
        $ng = new NiraGateway('user', 'pass');

        $this->assertNotEmpty($ng->getFareURI());
    }

    /** @test */
    public function can_search_flights()
    {
        $mock = new MockHandler([
            new Response(200, [], $this->getSearchResults()),
        ]);
        $ng = new NiraGateway('user', 'pass');
        $ng->setMock($mock)->setTesting(true);

        $sb = new ParameterBuilder();
        $sb->setAirline('PA')->setSource('ugt')->setTarget('ttq')->setDay('3')->setMonth('06')->setAdultCount('1')->setInfantCount('0');

        $res = $ng->search($sb);
        $this->assertISJson($res);
    }

    /** @test */
    public function can_get_availability_fare_results()
    {
        $mock = new MockHandler([
            new Response(200, [], $this->getAvailabilityFareResults()),
        ]);
        $ng = new NiraGateway('user', 'pass');
        $ng->setTesting(true)->setMock($mock);

        $fb = new FareParameterBuilder();

        $fb->setAirline('PA')->setRoute('ugt-ttq')->setRbd('Y')->setFlightNo('10')->setDepartureDate('2020-10-11');

        $res = $ng->getAvailabilityFare($fb);
        $this->assertISJson($res);
    }
}
