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
    public function it_should_throw_for_empty_flight_edtlast1()
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
    public function it_should_throw_for_empty_flight_edtage1()
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
    public function it_should_throw_for_empty_flight_edtID1()
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
    public function it_should_throw_for_empty_flight_edtContact()
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
    public function it_should_return_correct_array_result_on_build_parameter()
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
            'edtID1' => '123',
            'edtContact' => '09359000',
            'No' => '1',
        ];
        $this->assertEquals($expected_result, $sb->buildParams());
    }

    /** @test */
    public function it_should_return_correct_array_result_when_building_object_from_array()
    {
        $sb = ReserveParameterBuilder::fromArray([
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
            'edtID1' => '123',
            'edtContact' => '09359000',
            'No' => '1',
        ]);

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
            'edtID1' => '123',
            'edtContact' => '09359000',
            'No' => '1',
        ];

        $this->assertEquals($expected_result, $sb->buildParams());
    }

    /** @test */
    public function can_add_passengers()
    {
        $sb = ReserveParameterBuilder::fromArray($expected_result = [
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
            'edtID1' => '123',
            'edtContact' => '09359000',
            'No' => '1',
        ]);
        $sb->addPassenger($id = '5135959595959', $age = '12', $last = 'DOE', $name = 'junior');

        $expected_result = array_merge($expected_result, [
            'edtID2' => $id,
            'edtAge2' => $age,
            'edtName2' => $name,
            'edtLast2' => $last,
            'No' => '2',
        ]);

        $this->assertEquals($expected_result, $sb->buildParams());
    }

    private function data_provider($adult_count = 0, $child_count = 0, $infant_count = 0)
    {
        $sb = ReserveParameterBuilder::fromArray($expected_result = [
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
            'edtID1' => '123',
            'edtContact' => '09359000',
            'No' => '1',
        ]);

        if ($adult_count > 0) {
            foreach (range(1, $adult_count) as $i) {
                $sb->addPassenger('5135959595959', '29', 'DOE', 'junior');
            }
        }

        if ($child_count > 0) {
            foreach (range(1, $child_count) as $i) {
                $sb->addPassenger('5135959595959', '11', 'DOE', 'junior');
            }
        }

        if ($infant_count > 0) {
            foreach (range(1, $infant_count) as $i) {
                $sb->addPassenger('5135959595959', '1', 'DOE', 'junior');
            }
        }

        return $sb;
    }

    /** @test */
    public function it_can_return_number_of_passengers_correctly()
    {
        $reserve_parameter_builder = $this->data_provider(0, 1);
        $this->assertEquals(2, $reserve_parameter_builder->getNumberOfPassengers());
    }

    /** @test */
    public function it_can_return_number_of_adult_passengers()
    {
        $reserve_parameter_builder = $this->data_provider(1, 2, 2);
        $this->assertEquals(6, $reserve_parameter_builder->getNumberOfPassengers());
        $this->assertEquals(2, $reserve_parameter_builder->getNumberOfAdultPassengers());
    }

    /** @test */
    public function it_can_return_number_child_passengers_correctly()
    {
        $reserve_parameter_builder = $this->data_provider(0, 2);
        $this->assertEquals(3, $reserve_parameter_builder->getNumberOfPassengers());
        $this->assertEquals(2, $reserve_parameter_builder->getNumberOfChildPassengers());
    }

    /** @test */
    public function it_can_return_number_of_infant_passengers_correctly()
    {
        $reserve_parameter_builder = $this->data_provider(0, 2, 2);
        $this->assertEquals(5, $reserve_parameter_builder->getNumberOfPassengers());
        $this->assertEquals(2, $reserve_parameter_builder->getNumberOfInfantPassengers());
    }
}
