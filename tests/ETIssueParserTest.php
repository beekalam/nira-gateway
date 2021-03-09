<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\ETIssueParser;
use Beekalam\NiraGateway\ReserveTicketParser;

class ETIssueParserTest extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->et = ETIssueParser::fromJson($this->getETIssueResults());
    }

    /** @test */
    public function it_should_correctly_get_tickets()
    {
        $this->assertEquals(3, count($this->et->getTickets()));
    }
}
