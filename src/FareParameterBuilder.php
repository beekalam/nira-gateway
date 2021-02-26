<?php

declare(strict_types=1);

namespace Beekalam\NiraGateway;

use InvalidArgumentException;

class FareParameterBuilder
{
    /**
     * @var string
     */
    private $airline;

    /**
     * @var string
     */
    private $route;

    /**
     * @var string
     */
    private $rbd;

    /**
     * @var string
     */
    private $departureDate;

    /**
     * @var string
     */
    private $flightNo;

    /**
     * @param string $airline
     * @return FareParameterBuilder
     */
    public function setAirline($airline)
    {
        $this->airline = $airline;

        return $this;
    }

    /**
     * @param string $route
     * @return FareParameterBuilder
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * @param string $rbd
     * @return FareParameterBuilder
     */
    public function setRbd($rbd)
    {
        $this->rbd = $rbd;

        return $this;
    }

    /**
     * @param string $departureDate
     * @return FareParameterBuilder
     */
    public function setDepartureDate($departureDate)
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    /**
     * @param string $flightNo
     * @return FareParameterBuilder
     */
    public function setFlightNo($flightNo)
    {
        $this->flightNo = $flightNo;

        return $this;
    }

    public function buildParams()
    {
        if (empty($this->airline)) {
            throw new InvalidArgumentException('Airline can not be empty');
        }

        if (empty($this->route)) {
            throw new InvalidArgumentException('Route can not be empty');
        }

        if (empty($this->rbd)) {
            throw new InvalidArgumentException('RBD can not be empty');
        }

        if (empty($this->flightNo)) {
            throw new InvalidArgumentException('FlightNo can not be empty');
        }

        if (empty($this->departureDate)) {
            throw new InvalidArgumentException('Departure date can not be empty');
        }

        return [
            'Airline' => $this->airline,
            'Route' => $this->route,
            'RBD' => $this->rbd,
            'DepartureDate' => $this->departureDate,
            'FlightNo' => $this->flightNo,
        ];
    }

    public static function fromArray($arr)
    {
        $fb = new self();
        $fb->setAirline($arr['Airline']);
        $fb->setRoute($arr['Route']);
        $fb->setRbd($arr['RBD']);
        $fb->setFlightNo($arr['FlightNo']);
        $fb->setDepartureDate($arr['DepartureDate']);

        return $fb;
    }
}
