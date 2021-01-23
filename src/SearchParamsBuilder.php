<?php
declare(strict_types=1);


namespace Beekalam\NiraGateway;


class SearchParamsBuilder
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
     * @return SearchParamsBuilder
     */
    public function setAirline(string $airline): SearchParamsBuilder
    {
        $this->airline = $airline;
        return $this;
    }

    /**
     * @param string $source
     * @return SearchParamsBuilder
     */
    public function setSource(string $source): SearchParamsBuilder
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @param string $target
     * @return SearchParamsBuilder
     */
    public function setTarget(string $target): SearchParamsBuilder
    {
        $this->target = $target;
        return $this;
    }

    /**
     * @param string $day
     * @return SearchParamsBuilder
     */
    public function setDay(string $day): SearchParamsBuilder
    {
        $this->day = $day;
        return $this;
    }

    /**
     * @param string $month
     * @return SearchParamsBuilder
     */
    public function setMonth(string $month): SearchParamsBuilder
    {
        $this->month = $month;
        return $this;
    }

    /**
     * @param string $adultCount
     * @return SearchParamsBuilder
     */
    public function setAdultCount(string $adultCount): SearchParamsBuilder
    {
        $this->adultCount = $adultCount;
        return $this;
    }

    /**
     * @param string $childCount
     * @return SearchParamsBuilder
     */
    public function setChildCount(string $childCount): SearchParamsBuilder
    {
        $this->childCount = $childCount;
        return $this;
    }

    /**
     * @param string $infantCount
     * @return SearchParamsBuilder
     */
    public function setInfantCount(string $infantCount): SearchParamsBuilder
    {
        $this->infantCount = $infantCount;
        return $this;
    }

    public function buildParams(): array
    {
        return [
            'airline'     => $this->airline,
            'cbSource'    => $this->source,
            'cbTarget'    => $this->target,
            'cbDay1'      => $this->day,
            'cbMonth1'    => $this->month,
            'cbAdultQty'  => $this->adultCount,
            'cbInfantQty' => $this->infantCount
        ];
    }
}
