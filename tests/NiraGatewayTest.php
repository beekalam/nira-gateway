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
    public function can_get_fare_results()
    {
        $mock = new MockHandler([
            new Response(200, [], $this->getFareResults()),
        ]);
        $ng = new NiraGateway('user', 'pass');
        $ng->setTesting(true)
           ->setMock($mock);


        $fb = new FareParameterBuilder();

        $fb->setAirline('PA')
           ->setRoute('ugt-ttq')
           ->setRbd('Y')
           ->setFlightNo('10')
           ->setDepartureDate('2020-10-11');

        $res = $ng->getFlightFare($fb);
        $this->assertISJson($res);
    }
}
