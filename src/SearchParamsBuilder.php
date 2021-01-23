<?php
declare(strict_types=1);


namespace Beekalam\NiraGateway;


class SearchParamsBuilder
{
    private string $airline;
    private string $source;
    private string $target;
    private int $day;
    private int $month;
    private int $adultCount;
    private int $childCount;
    private int $infantCount;

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
     * @param int $day
     * @return SearchParamsBuilder
     */
    public function setDay(int $day): SearchParamsBuilder
    {
        $this->day = $day;
        return $this;
    }

    /**
     * @param int $month
     * @return SearchParamsBuilder
     */
    public function setMonth(int $month): SearchParamsBuilder
    {
        $this->month = $month;
        return $this;
    }

    /**
     * @param int $adultCount
     * @return SearchParamsBuilder
     */
    public function setAdultCount(int $adultCount): SearchParamsBuilder
    {
        $this->adultCount = $adultCount;
        return $this;
    }

    /**
     * @param int $childCount
     * @return SearchParamsBuilder
     */
    public function setChildCount(int $childCount): SearchParamsBuilder
    {
        $this->childCount = $childCount;
        return $this;
    }

    /**
     * @param int $infantCount
     * @return SearchParamsBuilder
     */
    public function setInfantCount(int $infantCount): SearchParamsBuilder
    {
        $this->infantCount = $infantCount;
        return $this;
    }
}
