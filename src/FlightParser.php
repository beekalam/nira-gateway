<?php


namespace Beekalam\NiraGateway;


class FlightParser
{

    private array $arr;

    public function __construct($arr)
    {
        $this->arr = $arr;
    }

    public function getDepartureDateTime()
    {
        return $this->arr["DepartureDateTime"];
    }

    public function getDepartureDate()
    {
        return explode(' ', $this->getDepartureDateTime())[0];
    }

    public function getDepartureTime()
    {
        return explode(' ', $this->getDepartureDateTime())[1];
    }

    public function getArrivalDateTime()
    {
        return $this->arr["ArrivalDateTime"];
    }

    public function getArrivalDate()
    {
        return explode(' ', $this->getArrivalDateTime())[0];
    }

    public function getArrivalTime()
    {
        return explode(' ', $this->getArrivalDateTime())[1];
    }

    public function getFlightLength()
    {
        $diff_min = (strtotime($this->getArrivalDateTime()) - strtotime($this->getDepartureDateTime())) / 60 / 60;
        return $diff_min;
    }

    public function getAirline()
    {
        return $this->arr['Airline'];
    }

    public function getOrigin()
    {
        return $this->arr['Origin'];
    }

    public function getDestination()
    {
        return $this->arr['Destination'];
    }

    public function getFlightNo()
    {
        return $this->arr['FlightNo'];
    }

    public function getClassRefundStatus()
    {
        return $this->arr['ClassRefundStatus'];
    }

    public function getAirCraftTypeCode()
    {
        return $this->arr['ClassesStatus'];
    }

    public function getAdultTotalPrices()
    {
        return $this->arr['AdultTotalPrices'];
    }

    public function getAirCraftTypeName()
    {
        return $this->arr['AircraftTypeName'];
    }

    public function getOriginalResult()
    {
        return $this->arr;
    }
}
