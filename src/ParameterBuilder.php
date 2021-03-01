<?php

declare(strict_types=1);

namespace Beekalam\NiraGateway;

use InvalidArgumentException;

class ParameterBuilder
{
    /**
     * @var string
     */
    private $airline;

    /**
     * @var string
     */
    private $source;

    /**
     * @var string
     */
    private $target;

    /**
     * @var string
     */
    private $day;

    /**
     * @var string
     */
    private $month;

    /**
     * @var string
     */
    private $adultCount;

    /**
     * @var string
     */
    private $childCount;

    /**
     * @var string
     */
    private $infantCount;

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
    public function setAirline(string $airline)
    {
        $this->airline = $airline;

        return $this;
    }

    /**
     * @param string $source
     * @return ParameterBuilder
     */
    public function setSource(string $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @param string $target
     * @return ParameterBuilder
     */
    public function setTarget(string $target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * @param string $day
     * @return ParameterBuilder
     */
    public function setDay(string $day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * @param string $month
     * @return ParameterBuilder
     */
    public function setMonth(string $month)
    {
        $this->month = $month;

        return $this;
    }

    /**
     * @param string $adultCount
     * @return ParameterBuilder
     */
    public function setAdultCount(string $adultCount)
    {
        $this->adultCount = $adultCount;

        return $this;
    }

    /**
     * @param string $childCount
     * @return ParameterBuilder
     */
    public function setChildCount(string $childCount)
    {
        $this->childCount = $childCount;

        return $this;
    }

    /**
     * @param string $infantCount
     * @return ParameterBuilder
     */
    public function setInfantCount(string $infantCount)
    {
        $this->infantCount = $infantCount;

        return $this;
    }

    public function buildParams(): array
    {
        if (empty($this->source)) {
            throw new InvalidArgumentException('Source can not be empty');
        }

        if (empty($this->target)) {
            throw new InvalidArgumentException('Target can not be empty');
        }

        if (empty($this->target)) {
            throw new InvalidArgumentException('Day can not be empty');
        }

        if (empty($this->day)) {
            throw new InvalidArgumentException('Day can not be empty');
        }

        if (empty($this->month)) {
            throw new InvalidArgumentException('Month can not be empty');
        }

        return [
            'airline' => $this->airline,
            'cbSource' => $this->source,
            'cbTarget' => $this->target,
            'cbDay1' => $this->day,
            'cbMonth1' => $this->month,
            'cbAdultQty' => $this->adultCount,
            'cbInfantQty' => $this->infantCount,
            'cbChildQty' => $this->childCount,
        ];
    }

    public static function fromArray(array $parameters): ParameterBuilder
    {
        $expected_keys = [
            'airline' => 'setAirline',
            'cbSource' => 'setSource',
            'cbTarget' => 'setTarget',
            'cbDay1' => 'setDay',
            'cbMonth1' => 'setMonth',
            'cbAdultQty' => 'setAdultCount',
            'cbInfantQty' => 'setInfantCount',
            'cbChildQty' => 'setChildCount',
        ];
        $pb = new self();
        foreach ($expected_keys as $k => $v) {
            if (array_key_exists($k, $parameters)) {
                $pb->{$v}($parameters[$k]);
            }
        }

        return $pb;
    }
}
