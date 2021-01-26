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
        $departure = date_create($flight->getDepartureDateTime());
        $arrival = date_create($flight->getArrivalDateTime());
        /** @var \DateInterval $diff */
        $diff = $arrival->diff($departure);
        var_dump($diff->m);
        // var_dump(
        //     $flight->getDepartureDateTime(),
        //     $flight->getArrivalDateTime()
        // );
    }
}
