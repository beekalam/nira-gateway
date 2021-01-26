<?php


namespace Beekalam\NiraGateway;


class FlightParser
{

    private array $arr;
    private string $departureDateTime;
    private string $arrivalDateTime;
    private string $airline;
    private string $origin;
    private string $destination;
    private string $flightNo;
    private string $airCraftTypeName;
    private string $classRefundStatus;
    private string $airCraftTypeCode;


    public function __construct($arr)
    {
        $this->arr = $arr;
        $this->setDepartureDateTime($this->arr['DepartureDateTime']);
        $this->setArrivalDateTime($this->arr['ArrivalDateTime']);
        $this->setAirline($this->arr['Airline']);
        $this->setOrigin($this->arr['Origin']);
        $this->setDestination($this->arr['Destination']);
        $this->setFlightNo($this->arr['FlightNo']);
        $this->setAirCraftTypeName($this->arr['AircraftTypeName']);
        $this->setClassRefundStatus($this->arr['ClassRefundStatus']);
        $this->setAirCraftTypeCode($this->arr['AircraftTypeCode']);
    }

    public function getDepartureDateTime()
    {
        return $this->departureDateTime;
    }

    public function setDepartureDateTime($departureDateTime)
    {
        return $this->departureDateTime = $departureDateTime;
    }

    public function getDepartureDate()
    {
        return explode(' ', $this->getDepartureDateTime());
    }

    public function getDepartureTime()
    {
        return explode(' ', $this->getDepartureDateTime());
    }

    public function getArrivalDateTime()
    {
        return $this->arrivalDateTime;
    }

    public function setArrivalDateTime($arrivalDateTime)
    {
        $this->arrivalDateTime = $arrivalDateTime;
    }

    public function getArrivalDate()
    {
        return explode(' ', $this->getArrivalDateTime());
    }

    public function getArrivalTime()
    {
        return explode(' ', $this->getArrivalDateTime());
    }


    public function getDateInterval()
    {
        $departure = date_create($this->getDepartureDateTime());
        $arrival = date_create($this->getArrivalDateTime());

        /** @var \DateInterval $diff */
        return $arrival->diff($departure);
    }


    public function getAirline()
    {
        return $this->airline;
    }

    public function setAirline($airline)
    {
        $this->airline = $airline;
    }

    public function getOrigin()
    {
        return $this->origin;
    }

    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    public function getDestination()
    {
        return $this->destination;
    }

    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    public function getFlightNo()
    {
        return $this->flightNo;
    }

    public function setFlightNo($flightNo)
    {
        $this->flightNo = $flightNo;
    }

    public function getClassRefundStatus()
    {
        return $this->classRefundStatus;
    }

    public function setClassRefundStatus($classesRefundStatus)
    {
        $this->classRefundStatus = $classesRefundStatus;
    }

    public function getAirCraftTypeCode()
    {
        return $this->airCraftTypeCode;
    }

    public function setAirCraftTypeCode($airCraftTypeCode)
    {
        $this->airCraftTypeCode = $airCraftTypeCode;
    }

    public function getAdultTotalPrices()
    {
        return $this->arr['AdultTotalPrices'];
    }

    public function getAirCraftTypeName()
    {
        return $this->airCraftTypeName;
    }

    public function setAirCraftTypeName($airCraftTypeName)
    {
        $this->airCraftTypeName = $airCraftTypeName;
    }

    public function getOriginalResult()
    {
        return $this->arr;
    }

    public function getFlightLengthDesc()
    {
        $diff = $this->getDateInterval();
        $ans = "";
        if ($diff->h > 0) {
            $ans = sprintf("%s ساعت", $diff->h);
        }
        if ($diff->i > 0) {
            if ($diff->h > 0)
                $ans .= sprintf(" و ");
            $ans .= sprintf("%s دقیقه", $diff->i);
        }
        return $ans;
    }
}
