<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\ReserveTicketParameterBuilder;

class ReserveTicketParameterBuilderTest extends BaseTestCase
{
    /** @test */
    function it_should_return_correct_paramters()
    {
        $rt = new ReserveTicketParameterBuilder('PA', 'pa13');

        $expected_results = [
            'Airline' => 'PA',
            'PNR' => 'pa13',
        ];
        $this->assertEquals($expected_results, $rt->buildParams());
    }

    /** @test */
    function it_should_throw_on_empty_airline()
    {
        $this->expectException(\InvalidArgumentException::class);
        ReserveTicketParameterBuilder::fromArray([
            'PNR' => 'pnr123',
        ]);
    }

    /** @test */
    function it_should_throw_on_empty_pnr()
    {
        $this->expectException(\InvalidArgumentException::class);
        ReserveTicketParameterBuilder::fromArray([
            'Airline' => 'PA',
        ]);
    }
}
