<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\FareParameterBuilder;
use PHPUnit\Framework\TestCase;

class FareParameterBuilderTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_can_generate_acceptable_array_for_fare_query_in_Niragatewayclass()
    {
        $options = [
            'Airline' => 'PA',
            'Route' => 'ugt-ttq',
            'RBD' => 'Y',
            'DepartureDate' => '2020-10-11',
            'FlightNo' => '10',
        ];

        $fb = new FareParameterBuilder();
        $fb->setAirline('PA')
           ->setRoute('ugt-ttq')
           ->setRbd('Y')
           ->setFlightNo('10')
           ->setDepartureDate('2020-10-11');

        $this->assertEquals($options, $fb->buildParams());
    }

    /** @test */
    public function it_should_throw_for_null_airline()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new FareParameterBuilder();
        $sb->buildParams();
    }

    /** @test */
    public function it_should_throw_for_empty_route()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new FareParameterBuilder();
        $sb->setAirline('PA');
        $sb->buildParams();
    }

    /** @test */
    public function it_should_throw_for_empty_rbd()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new FareParameterBuilder();
        $sb->setAirline('PA')
           ->setRoute('ugt-ttq');

        $sb->buildParams();
    }

    /** @test */
    public function it_should_throw_for_empty_flight_no()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new FareParameterBuilder();
        $sb->setAirline('PA')
           ->setRoute('ugt-ttq')
           ->setRbd('Y');

        $sb->buildParams();
    }

    /** @test */
    public function it_should_throw_for_empty_departure_date()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new FareParameterBuilder();
        $sb->setAirline('PA')
           ->setRoute('ugt-ttq')
           ->setRbd('Y')
           ->setFlightNo('123');

        $sb->buildParams();
    }
}
