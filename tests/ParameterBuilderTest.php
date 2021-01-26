<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\ParameterBuilder;
use PHPUnit\Framework\TestCase;

class ParameterBuilderTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_can_generate_acceptable_array_for_search_in_Niragatewayclass()
    {
        $options = [
            'airline' => 'PA',
            'cbSource' => 'ugt',
            'cbTarget' => 'ttq',
            'cbDay1' => '3',
            'cbMonth1' => '06',
            'cbAdultQty' => '1',
            'cbInfantQty' => '0',
            'cbChildQty' => '1',
        ];

        $sb = new ParameterBuilder();
        $sb->setAirline('PA')
           ->setSource('ugt')
           ->setTarget('ttq')
           ->setDay('3')
           ->setMonth('06')
           ->setAdultCount('1')
           ->setInfantCount('0')
           ->setChildCount('1');

        $this->assertEquals($options, $sb->buildParams());
    }

    /** @test */
    public function it_should_throw_for_null_source()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ParameterBuilder();
        $sb->buildParams();
    }

    /** @test */
    public function it_should_throw_for_null_target()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ParameterBuilder();
        $sb->setAirline('PA')
           ->setSource('ugt');
        $sb->buildParams();
    }

    /** @test */
    public function it_should_throw_for_empty_day()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ParameterBuilder();
        $sb->setAirline('PA')
           ->setSource('ugt')
           ->setTarget('ttq');

        $sb->buildParams();
    }

    /** @test */
    public function it_should_throw_for_null_month()
    {
        $this->expectException(\InvalidArgumentException::class);

        $sb = new ParameterBuilder();
        $sb = new ParameterBuilder();
        $sb->setAirline('PA')
           ->setSource('ugt')
           ->setTarget('ttq')
           ->setDay('3');

        $sb->buildParams();
    }
}
