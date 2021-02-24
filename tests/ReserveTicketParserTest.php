<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\ReserveTicketParser;

class ReserveTicketParserTest extends BaseTestCase
{
    private $rt;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rt = json_decode($this->getReserveInfoResults(), true);
    }

    /** @test */
    public function it_should_return_correct_Quantities_based_on_reserve_endpoint_data()
    {
        $rtp = new ReserveTicketParser($this->rt);

        $this->assertEquals('1', $rtp->getAdultQTY());
        $this->assertEquals('0', $rtp->getInfantQTY());
        $this->assertEquals('0', $rtp->getChildQTY());
    }

    /** @test */
    public function it_should_return_correct_prices()
    {
        $rtp = new ReserveTicketParser($this->rt);

        $this->assertEquals('2280000', $rtp->getAdultTP());
        $this->assertEquals('1220000', $rtp->getChildTP());
        $this->assertEquals('372000', $rtp->getInfantTP());
        $this->assertEquals('2280000', $rtp->getTotalPrice());
    }

    /** @test */
    public function it_should_return_correct_segments()
    {
        $rtp = new ReserveTicketParser($this->rt);
        $this->assertEquals($this->rt['Segments'], $rtp->getSegments());
    }

    /** @test */
    public function it_should_return_correct_tickets()
    {
        $rtp = new ReserveTicketParser($this->rt);
        $this->assertEquals($this->rt['Tickets'], $rtp->getTickets());
    }

    /** @test */
    public function it_should_return_correct_docs()
    {
        $rtp = new ReserveTicketParser($this->rt);
        $this->assertEquals($this->rt['DOCS'], $rtp->getDocs());
    }

    /** @test */
    public function it_should_return_correct_contact()
    {
        $rtp = new ReserveTicketParser($this->rt);
        $this->assertEquals($this->rt['Contact'], $rtp->getContact());
    }
}
