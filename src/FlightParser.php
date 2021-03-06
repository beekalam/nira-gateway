<?php

namespace Beekalam\NiraGateway;

class FlightParser
{
    /**
     * @var array
     */
    private $arr;

    /**
     * @var string
     */
    private $departureDateTime;

    /**
     * @var string
     */
    private $arrivalDateTime;

    /**
     * @var string
     */
    private $airline;

    /**
     * @var string
     */
    private $origin;

    /**
     * @var string
     */
    private $destination;

    /**
     * @var
     */
    private $adultTotalPrices;

    /**
     * @var  string
     */
    private $flightNo;

    /**
     * @var string
     */
    private $airCraftTypeName;

    /**
     * @var string
     */
    private $classRefundStatus;

    /**
     * @var string
     */
    private $airCraftTypeCode;

    public function __construct($arr)
    {
        $this->arr = $arr;
        $this->setDepartureDateTime($this->arr['DepartureDateTime']);
        $this->setArrivalDateTime($this->arr['ArrivalDateTime']);
        $this->setAirline($this->arr['Airline']);
        $this->setOrigin($this->arr['Origin']);
        $this->setDestination($this->arr['Destination']);
        $this->setFlightNo($this->arr['FlightNo']);

        $this->setAirCraftTypeName($this->arr['AircraftTypeName'] ?? '');
        $this->setClassRefundStatus($this->arr['ClassRefundStatus'] ?? '');
        $this->setAirCraftTypeCode($this->arr['AircraftTypeCode'] ?? '');
        $this->setAdultTotalPrices($this->arr['AdultTotalPrices'] ?? '');
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
        return explode(' ', $this->getDepartureDateTime())[0];
    }

    public function getDepartureTime()
    {
        return explode(' ', $this->getDepartureDateTime())[1];
    }

    public function getDepartureTimePeriod()
    {
        return $this->getTimePeriod($this->getDepartureDateTime());
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
        return explode(' ', $this->getArrivalDateTime())[0];
    }

    public function getArrivalTime()
    {
        return explode(' ', $this->getArrivalDateTime())[1];
    }

    public function getArrivalTimePeriod()
    {
        return $this->getTimePeriod($this->getArrivalDateTime());
    }

    public function setAdultTotalPrices($adultTotalPrices)
    {
        $this->adultTotalPrices = $adultTotalPrices;
    }

    public function getAdultTotalPrices()
    {
        return $this->adultTotalPrices;
    }

    public function pricesByClass()
    {
        $res = [];
        foreach (explode(' ', $this->getAdultTotalPrices()) as $price) {
            [$k, $v] = explode(':', $price);
            $res[$k] = $v;
        }

        return $res;
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
        $ans = '';
        if ($diff->h > 0) {
            $ans = sprintf('%s ساعت', $diff->h);
        }
        if ($diff->i > 0) {
            if ($diff->h > 0) {
                $ans .= sprintf(' و ');
            }
            $ans .= sprintf('%s دقیقه', $diff->i);
        }

        return $ans;
    }

    private function getTimePeriod($dateTime)
    {
        return date('A', strtotime($dateTime)) == 'AM' ? 'صبح' : 'بعد الظهر';
    }

    /**
     * @param $json
     * @return array
     */
    public static function fromJson($json): array
    {
        $flights = [];
        $flights_array = \json_decode($json, true);
        if (isset($flights_array['AvailableFlights'])) {
            foreach ($flights_array['AvailableFlights'] as $flight) {
                $flights[] = new FlightParser($flight);
            }
        }

        return $flights;
    }
}
