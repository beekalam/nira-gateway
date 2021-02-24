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
}
