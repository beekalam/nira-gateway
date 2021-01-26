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
    public function it_can_parse_flight_length_correctly()
    {
        $flight = new FlightParser($this->getFirstSearchResult());
        $flight->setDepartureDateTime("2020-08-01 21:00:00");
        $flight->setArrivalDateTime("2020-08-01 22:00:00");

        $this->assertEquals(1, $flight->getDateInterval()->h);
    }

    /** @test */
    public function it_can_parse_flight_departure_date()
    {
        $flight = new FlightParser($this->getFirstSearchResult());
        $flight->setDepartureDateTime("2020-08-01 21:00:00");

        $this->assertEquals("2020-08-01", $flight->getDepartureDate());
    }

    /** @test */
    public function it_can_parse_flight_departure_time()
    {
        $flight = new FlightParser($this->getFirstSearchResult());
        $flight->setDepartureDateTime("2020-08-01 21:00:00");

        $this->assertEquals("21:00:00", $flight->getDepartureTime());
    }

    /** @test */
    public function it_can_parse_flight_arrival_date()
    {
        $flight = new FlightParser($this->getFirstSearchResult());
        $flight->setArrivalDateTime("2020-08-01 21:00:00");

        $this->assertEquals("2020-08-01", $flight->getArrivalDate());
    }

    /** @test */
    public function it_can_parse_flight_arrival_time()
    {
        $flight = new FlightParser($this->getFirstSearchResult());
        $flight->setArrivalDateTime("2020-08-01 21:00:00");

        $this->assertEquals("21:00:00", $flight->getArrivalTime());
    }

    /** @test */
    public function it_can_parse_flight_length_minutes()
    {
        $flight = new FlightParser($this->getFirstSearchResult());
        $flight->setDepartureDateTime("2020-08-01 21:00:00");
        $flight->setArrivalDateTime("2020-08-01 22:30:00");

        $this->assertEquals(30, $flight->getDateInterval()->i);
    }

    /** @test */
    public function it_can_return_flight_length_description()
    {
        $flight = new FlightParser($this->getFirstSearchResult());
        $flight->setDepartureDateTime("2020-08-01 21:00:00");
        $flight->setArrivalDateTime("2020-08-01 22:30:00");

        $expected = sprintf("%s ساعت و %s دقیقه", 1, 30);
        $this->assertEquals($expected, $flight->getFlightLengthDesc());
    }

    /** @test */
    public function it_can_return_time_period_description()
    {
        $flight = new FlightParser($this->getFirstSearchResult());
        $flight->setDepartureDateTime("2020-08-01 11:00:00");
        $flight->setArrivalDateTime("2020-08-01 22:30:00");

        $this->assertEquals("صبح", $flight->getDepartureTimePeriod());
        $this->assertEquals("بعد الظهر", $flight->getArrivalTimePeriod());
    }

    /** @test */
    public function it_can_return_adult_prices()
    {
        $flight = new FlightParser($this->getFirstSearchResult());
        $prices_by_class = $flight->pricesByClass();

        $this->assertArrayHasKey('Z', $prices_by_class);
        $this->assertArrayHasKey('L', $prices_by_class);
        $this->assertArrayHasKey('G', $prices_by_class);

        $this->assertEquals('1140000', $prices_by_class['Z']);
        $this->assertEquals('1140000', $prices_by_class['L']);
        $this->assertEquals('1352000', $prices_by_class['G']);
    }
}
