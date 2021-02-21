<?php

declare(strict_types=1);

namespace Beekalam\NiraGateway;

use Webmozart\Assert\Assert;

class ReserveParameterBuilder
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
    private $flightClass;

    /**
     * @var string
     */
    private $flightNo;

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
    private $edtName1;

    /**
     * @var string
     */
    private $edtAge1;

    /**
     * @var string
     */
    private $edtID1;

    /**
     * @var string
     */
    private $edtContact;

    /**
     * number of passengers.
     *
     * @var string
     */
    private $no;

    public function __construct()
    {
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
     * @param string $edtName1
     * @return ReserveParameterBuilder
     */
    public function setEdtName1(string $edtName1): ReserveParameterBuilder
    {
        $this->edtName1 = $edtName1;

        return $this;
    }

    /**
     * @param string $edtAge1
     * @return ReserveParameterBuilder
     */
    public function setEdtAge1(string $edtAge1): ReserveParameterBuilder
    {
        $this->edtAge1 = $edtAge1;

        return $this;
    }

    /**
     * @param string $edtID1
     * @return ReserveParameterBuilder
     */
    public function setEdtID1(string $edtID1): ReserveParameterBuilder
    {
        $this->edtID1 = $edtID1;

        return $this;
    }

    /**
     * @param string $edtContact
     * @return ReserveParameterBuilder
     */
    public function setEdtContact(string $edtContact): ReserveParameterBuilder
    {
        $this->edtContact = $edtContact;

        return $this;
    }

    /**
     * @param string $no
     * @return ReserveParameterBuilder
     */
    public function setNo(string $no): ReserveParameterBuilder
    {
        $this->no = $no;

        return $this;
    }

    /**
     * @param string $flightClass
     * @return ReserveParameterBuilder
     */
    public function setFlightClass(string $flightClass): ReserveParameterBuilder
    {
        $this->flightClass = $flightClass;

        return $this;
    }

    /**
     * @param string $flightNo
     * @return ReserveParameterBuilder
     */
    public function setFlightNo(string $flightNo): ReserveParameterBuilder
    {
        $this->flightNo = $flightNo;

        return $this;
    }

    public function buildParams()
    {
        Assert::notEmpty($this->airline, 'Airline can not be empty.');
        Assert::notEmpty($this->source, 'cbSource can not be empty');
        Assert::notEmpty($this->target, 'cbTarget can not be empty');
        Assert::notEmpty($this->flightClass, 'Flight class can not be empty');
        Assert::notEmpty($this->flightNo, 'Flight Number can not be empty');
        Assert::notEmpty($this->day, 'Day can not be empty');
        Assert::notEmpty($this->month, 'Month can not be empty');

        return [];
    }
}
