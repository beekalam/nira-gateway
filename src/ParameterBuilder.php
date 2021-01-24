<?php
declare(strict_types=1);


namespace Beekalam\NiraGateway;

use InvalidArgumentException;


class ParameterBuilder
{
    private string $airline;
    private string $source;
    private string $target;
    private string $day;
    private string $month;
    private string $adultCount;
    private string $childCount;
    private string $infantCount;

    /**
     * SearchParamsBuilder constructor.
     */
    public function __construct()
    {
        $this->infantCount = '0';
        $this->childCount = '0';
    }

    /**
     * @param string $airline
     * @return ParameterBuilder
     */
    public function setAirline(string $airline): ParameterBuilder
    {
        $this->airline = $airline;
        return $this;
    }

    /**
     * @param string $source
     * @return ParameterBuilder
     */
    public function setSource(string $source): ParameterBuilder
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @param string $target
     * @return ParameterBuilder
     */
    public function setTarget(string $target): ParameterBuilder
    {
        $this->target = $target;
        return $this;
    }

    /**
     * @param string $day
     * @return ParameterBuilder
     */
    public function setDay(string $day): ParameterBuilder
    {
        $this->day = $day;
        return $this;
    }

    /**
     * @param string $month
     * @return ParameterBuilder
     */
    public function setMonth(string $month): ParameterBuilder
    {
        $this->month = $month;
        return $this;
    }

    /**
     * @param string $adultCount
     * @return ParameterBuilder
     */
    public function setAdultCount(string $adultCount): ParameterBuilder
    {
        $this->adultCount = $adultCount;
        return $this;
    }

    /**
     * @param string $childCount
     * @return ParameterBuilder
     */
    public function setChildCount(string $childCount): ParameterBuilder
    {
        $this->childCount = $childCount;
        return $this;
    }

    /**
     * @param string $infantCount
     * @return ParameterBuilder
     */
    public function setInfantCount(string $infantCount): ParameterBuilder
    {
        $this->infantCount = $infantCount;
        return $this;
    }

    public function buildParams(): array
    {
        if (empty($this->source)) {
            throw new InvalidArgumentException("Source can not be empty");
        }

        if (empty($this->target)) {
            throw new InvalidArgumentException("Target can not be empty");
        }

        if (empty($this->target)) {
            throw new InvalidArgumentException("Day can not be empty");
        }

        if (empty($this->day)) {
            throw new InvalidArgumentException("Day can not be empty");
        }

        if (empty($this->month)) {
            throw new InvalidArgumentException("Month can not be empty");
        }

        return [
            'airline'     => $this->airline,
            'cbSource'    => $this->source,
            'cbTarget'    => $this->target,
            'cbDay1'      => $this->day,
            'cbMonth1'    => $this->month,
            'cbAdultQty'  => $this->adultCount,
            'cbInfantQty' => $this->infantCount,
            'cbChildQty'  => $this->childCount
        ];
    }
}
