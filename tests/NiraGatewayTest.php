<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\FareParameterBuilder;
use Beekalam\NiraGateway\NiraGateway;
use Beekalam\NiraGateway\ParameterBuilder;
use Beekalam\NiraGateway\ReserveParameterBuilder;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

class NiraGatewayTest extends BaseTestCase
{
    /** @test */
    public function when_no_availability_uri_is_give_a_default_value_is_used()
    {
        $ng = new NiraGateway('user', 'pass');

        $this->assertNotEmpty($ng->getAvailabilityURI());
    }

    /** @test */
    public function when_no_availability_fare_uri_is_given_a_default_value_is_used()
    {
        $ng = new NiraGateway('user', 'pass');

        $this->assertNotEmpty($ng->getAvailabilityFareURI());
    }

    /** @test */
    public function when_no_fare_uri_is_given_a_default_value_is_used()
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

    /** @test */
    public function can_get_fare_results()
    {
        $mock = new MockHandler([
            new Response(200, [], $this->getFareResults()),
        ]);

        $ng = new NiraGateway('user', 'pass');
        $ng->setTesting(true)->setMock($mock);

        $fb = new FareParameterBuilder();

        $fb->setAirline('PA')->setRoute('ugt-ttq')->setRbd('Y')->setFlightNo('10')->setDepartureDate('2020-10-11');

        $res = $ng->getFare($fb);
        $this->assertISJson($res);
    }

    /** @test */
    public function can_reserve_flight()
    {
        $mock = new MockHandler([
            new Response(200, [], $this->getReserveResults()),
        ]);

        $ng = new NiraGateway('user', 'pass');
        $ng->setTesting(true)->setMock($mock);

        $rp = new ReserveParameterBuilder();
        $rp->setAirline('PA');
        $rp->setSource('SYZ');
        $rp->setTarget('THR');
        $rp->setFlightClass('A');
        $rp->setFlightNo('123');
        $rp->setDay('1');
        $rp->setMonth('1');
        $rp->setEdtName1('beekalam');
        $rp->setEdtLast1('beekalam');
        $rp->setEdtAge1('12');
        $rp->setEdtID1('123');
        $rp->setEdtContact('09359000');

        $res = $ng->reserve($rp);
        $this->assertISJson($res);
    }
}
