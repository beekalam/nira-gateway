<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\NiraGateway;
use PHPUnit\Framework\TestCase;

class NiraGatewayTest extends TestCase
{
    /** @test */
    public function true_is_true()
    {
        $ng = new NiraGateway('test', 'password');
        $this->assertNotNull($ng);
    }

    /** @test */
    public function can_search_flights()
    {
        $ng = new NiraGateway('test', 'password');
        $options = [
            'airline'     => 'PA',
            'cbSource'    => 'ugt',
            'cbTarget'    => 'ttq',
            'cbDay1'      => '3',
            'cbMonth1'    => '06',
            'cbAdultQty'  => '1',
            'cbInfantQty' => '0',
        ];
        $res = $ng->search($options);
        $this->assertNotNull($res);
    }

}
