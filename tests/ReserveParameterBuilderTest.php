<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\ReserveParameterBuilder;

class ReserveParameterBuilderTest extends BaseTestCase
{
    /** @test */
    public function it_should_throw_for_empty_airline()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ReserveParameterBuilder();
        $sb->buildParams();
    }

    /** @test */
    public function it_should_throw_for_empty_source()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ReserveParameterBuilder();
        $sb->setAirline('PA');

        $sb->buildParams();
    }

    /** @test */
    public function it_should_throw_for_empty_target()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ReserveParameterBuilder();
        $sb->setAirline('PA');
        $sb->setSource('SYZ');

        $sb->buildParams();
    }

    /** @test */
    public function it_should_throw_for_empty_flightClass()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ReserveParameterBuilder();
        $sb->setAirline('PA');
        $sb->setSource('SYZ');
        $sb->setTarget('THR');

        $sb->buildParams();
    }

    /** @test */
    public function it_should_throw_for_empty_FlightNo()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ReserveParameterBuilder();
        $sb->setAirline('PA');
        $sb->setSource('SYZ');
        $sb->setTarget('THR');
        $sb->setFlightClass('A');

        $sb->buildParams();
    }

    /** @test */
    public function it_should_throw_for_empty_FlightDay()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ReserveParameterBuilder();
        $sb->setAirline('PA');
        $sb->setSource('SYZ');
        $sb->setTarget('THR');
        $sb->setFlightClass('A');
        $sb->setFlightNo('123');

        $sb->buildParams();
    }

    /** @test */
    public function it_should_throw_for_empty_flight_month()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ReserveParameterBuilder();
        $sb->setAirline('PA');
        $sb->setSource('SYZ');
        $sb->setTarget('THR');
        $sb->setFlightClass('A');
        $sb->setFlightNo('123');
        $sb->setDay('1');

        $sb->buildParams();
    }
}
