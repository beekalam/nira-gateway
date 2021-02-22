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
        $sb->setTarget('THR');
        $sb->setFlightClass('A');
        $sb->setFlightNo('123');
        $sb->setDay('1');
        $sb->setMonth('1');
        $sb->setEdtName1('beekalam');
        $sb->setEdtLast1('beekalam');
        $sb->setEdtAge1('12');
        $sb->setEdtID1('123');
        $sb->setEdtContact('09359000');
        $sb->buildParams();
    }

    /** @test */
    public function it_should_throw_for_empty_target()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ReserveParameterBuilder();
        $sb->setAirline('PA');
        $sb->setSource('SYZ');
        $sb->setFlightClass('A');
        $sb->setFlightNo('123');
        $sb->setDay('1');
        $sb->setMonth('1');
        $sb->setEdtName1('beekalam');
        $sb->setEdtLast1('beekalam');
        $sb->setEdtAge1('12');
        $sb->setEdtID1('123');
        $sb->setEdtContact('09359000');
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
        $sb->setFlightNo('123');
        $sb->setDay('1');
        $sb->setMonth('1');
        $sb->setEdtName1('beekalam');
        $sb->setEdtLast1('beekalam');
        $sb->setEdtAge1('12');
        $sb->setEdtID1('123');
        $sb->setEdtContact('09359000');
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
        $sb->setDay('1');
        $sb->setMonth('1');
        $sb->setEdtName1('beekalam');
        $sb->setEdtLast1('beekalam');
        $sb->setEdtAge1('12');
        $sb->setEdtID1('123');
        $sb->setEdtContact('09359000');
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
        $sb->setMonth('1');
        $sb->setEdtName1('beekalam');
        $sb->setEdtLast1('beekalam');
        $sb->setEdtAge1('12');
        $sb->setEdtID1('123');
        $sb->setEdtContact('09359000');
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
        $sb->setEdtName1('beekalam');
        $sb->setEdtLast1('beekalam');
        $sb->setEdtAge1('12');
        $sb->setEdtID1('123');
        $sb->setEdtContact('09359000');
        $sb->buildParams();
    }

    /** @test */
    public function it_should_throw_for_empty_flight_edtname1()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ReserveParameterBuilder();
        $sb->setAirline('PA');
        $sb->setSource('SYZ');
        $sb->setTarget('THR');
        $sb->setFlightClass('A');
        $sb->setFlightNo('123');
        $sb->setDay('1');
        $sb->setMonth('1');
        $sb->setEdtLast1('beekalam');
        $sb->setEdtAge1('12');
        $sb->setEdtID1('123');
        $sb->setEdtContact('09359000');
        $sb->buildParams();
    }

    /** @test */
    function it_should_throw_for_empty_flight_edtlast1()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ReserveParameterBuilder();
        $sb->setAirline('PA');
        $sb->setSource('SYZ');
        $sb->setTarget('THR');
        $sb->setFlightClass('A');
        $sb->setFlightNo('123');
        $sb->setDay('1');
        $sb->setMonth('1');
        $sb->setEdtName1('beekalam');
        $sb->setEdtAge1('12');
        $sb->setEdtID1('123');
        $sb->setEdtContact('09359000');
        $sb->buildParams();
    }

    /** @test */
    function it_should_throw_for_empty_flight_edtage1()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ReserveParameterBuilder();
        $sb->setAirline('PA');
        $sb->setSource('SYZ');
        $sb->setTarget('THR');
        $sb->setFlightClass('A');
        $sb->setFlightNo('123');
        $sb->setDay('1');
        $sb->setMonth('1');
        $sb->setEdtName1('beekalam');
        $sb->setEdtLast1('beekalam');
        $sb->setEdtID1('123');
        $sb->setEdtContact('09359000');
        $sb->buildParams();
    }

    /** @test */
    function it_should_throw_for_empty_flight_edtID1()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ReserveParameterBuilder();
        $sb->setAirline('PA');
        $sb->setSource('SYZ');
        $sb->setTarget('THR');
        $sb->setFlightClass('A');
        $sb->setFlightNo('123');
        $sb->setDay('1');
        $sb->setMonth('1');
        $sb->setEdtName1('beekalam');
        $sb->setEdtLast1('beekalam');
        $sb->setEdtAge1('12');
        $sb->setEdtContact('09359000');

        $sb->buildParams();
    }

    /** @test */
    function it_should_throw_for_empty_flight_edtContact()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ReserveParameterBuilder();
        $sb->setAirline('PA');
        $sb->setSource('SYZ');
        $sb->setTarget('THR');
        $sb->setFlightClass('A');
        $sb->setFlightNo('123');
        $sb->setDay('1');
        $sb->setMonth('1');
        $sb->setEdtName1('beekalam');
        $sb->setEdtLast1('beekalam');
        $sb->setEdtAge1('12');
        $sb->setEdtID1('123');

        $sb->buildParams();
    }

    /** @test */
    function it_should_return_correct_array_result_on_build_parameter()
    {

        $sb = new ReserveParameterBuilder();
        $sb->setAirline('PA');
        $sb->setSource('SYZ');
        $sb->setTarget('THR');
        $sb->setFlightClass('A');
        $sb->setFlightNo('123');
        $sb->setDay('1');
        $sb->setMonth('1');
        $sb->setEdtName1('beekalam');
        $sb->setEdtLast1('beekalam');
        $sb->setEdtAge1('12');
        $sb->setEdtID1('123');
        $sb->setEdtContact('09359000');

        $expected_result = [
            'AirLine' => 'PA',
            'cbSource' => 'SYZ',
            'cbTarget' => 'THR',
            'FlightClass' => 'A',
            'FlightNo' => '123',
            'Day' => '1',
            'Month' => '1',
            'edtName1' => 'beekalam',
            'edtLast1' => 'beekalam',
            'edtAge1' => '12',
            'editID1' => '123',
            'edtContact' => '09359000',
            'No' => '1',
        ];
        $this->assertEquals($expected_result, $sb->buildParams());
    }
}
