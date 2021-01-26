<?php


namespace Beekalam\NiraGateway\Tests;


use Beekalam\NiraGateway\FlightParser;

class FlightParserTest extends BaseTestCase
{

    private function getFirstSearchResult()
    {
        return json_decode($this->getSearchResults(), true)['AvailableFlights'][0];
    }

    /** @test */
    function it_can_parse_flight_length_correctly()
    {

        $flight = new FlightParser($this->getFirstSearchResult());
        $flight->setDepartureDateTime("2020-08-01 21:00:00");
        $flight->setArrivalDateTime("2020-08-01 22:00:00");

        $this->assertEquals(1, $flight->getDateInterval()->h);
    }

    /** @test */
    function it_can_parse_flight_length_minutes()
    {
        $flight = new FlightParser($this->getFirstSearchResult());
        $flight->setDepartureDateTime("2020-08-01 21:00:00");
        $flight->setArrivalDateTime("2020-08-01 22:30:00");

        $this->assertEquals(30, $flight->getDateInterval()->i);
    }

    /** @test */
    function it_can_return_flight_length_description()
    {
        $flight = new FlightParser($this->getFirstSearchResult());
        $flight->setDepartureDateTime("2020-08-01 21:00:00");
        $flight->setArrivalDateTime("2020-08-01 22:30:00");

        $expected = sprintf("%s ساعت و %s دقیقه", 1, 30);
        $this->assertEquals($expected, $flight->getFlightLengthDesc());
    }
}
