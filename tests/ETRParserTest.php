<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\ETRParser;

class ETRParserTest extends BaseTestCase
{
    /** @test */
    function should_correctly_set_class_properties_from_input_data()
    {
        $etrresults = json_decode($this->getETRResults(), true);
        $etrparser = new ETRParser($etrresults);

        $this->assertEquals($etrresults['PassengerFullName'], $etrparser->getPassengerFullName());
        $this->assertEquals($etrresults['PAX'], $etrparser->getPAX());
        $this->assertEquals($etrresults['TotalPrice'], $etrparser->getTotalPrice());
        $this->assertEquals($etrresults['TAXES'], $etrparser->getTaxes());
        $this->assertEquals($etrresults['TicketNo'], $etrparser->getTicketNO());
        $this->assertEquals($etrresults['Comission'], $etrparser->getCommission());
        $this->assertEquals($etrresults['History'], $etrparser->getHistory());
        $this->assertEquals($etrresults['COUPONS'], $etrparser->getCoupons());
        $this->assertEquals($etrresults['Fare'], $etrparser->getFare());
    }
}
