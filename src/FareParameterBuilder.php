<?php
declare(strict_types=1);


namespace Beekalam\NiraGateway;


class FareParameterBuilder
{
    private string $airline;
    private string $route;
    private string $rbd;
    private string $departureDate;
    private string $flightNo;

    /**
     * @param string $airline
     * @return FareParameterBuilder
     */
    public function setAirline(string $airline): FareParameterBuilder
    {
        $this->airline = $airline;
        return $this;
    }

    /**
     * @param string $route
     * @return FareParameterBuilder
     */
    public function setRoute(string $route): FareParameterBuilder
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @param string $rbd
     * @return FareParameterBuilder
     */
    public function setRbd(string $rbd): FareParameterBuilder
    {
        $this->rbd = $rbd;
        return $this;
    }

    /**
     * @param string $departureDate
     * @return FareParameterBuilder
     */
    public function setDepartureDate(string $departureDate): FareParameterBuilder
    {
        $this->departureDate = $departureDate;
        return $this;
    }

    /**
     * @param string $flightNo
     * @return FareParameterBuilder
     */
    public function setFlightNo(string $flightNo): FareParameterBuilder
    {
        $this->flightNo = $flightNo;
        return $this;
    }

    public function buildParams()
    {

    }

}
