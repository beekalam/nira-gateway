<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\ReserveParser;

class ReserveParserTest extends BaseTestCase
{
    /** @test */
    public function it_can_tell_a_successful_reserve_result()
    {
        $rr = json_decode($this->getReserveResults(), true);
        $rp = new ReserveParser($rr);

        $this->assertTrue($rp->isSuccessful());
    }

    /** @test */
    public function it_should_correctly_set_the_pnr()
    {
        $rr = $this->getReserveResults($pnr = 'PAAA');
        $rr = json_decode($rr, true);
        $rp = new ReserveParser($rr);

        $this->assertEquals($pnr, $rp->getPnr());
    }

    /** @test */
    public function it_should_correctly_return_the_error()
    {
        $rr = $this->getReserveResults($pnr = 'PAAA', $error = 'InCorrect Age1');
        $rr = json_decode($rr, true);
        $rp = new ReserveParser($rr);

        $this->assertEquals($error, $rp->getError());
    }
}
