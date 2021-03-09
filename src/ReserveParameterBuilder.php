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
    private $edtLast1;

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

    private $passengers;

    public function __construct()
    {
        $this->no = 1;
        $this->passengers = [];
    }

    /**
     * @param string $airline
     * @return \Beekalam\NiraGateway\ReserveParameterBuilder
     */
    public function setAirline(string $airline)
    {
        $this->airline = $airline;

        return $this;
    }

    /**
     * @param string $source
     * @return \Beekalam\NiraGateway\ReserveParameterBuilder
     */
    public function setSource(string $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @param string $target
     * @return \Beekalam\NiraGateway\ReserveParameterBuilder
     */
    public function setTarget(string $target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * @param string $day
     * @return \Beekalam\NiraGateway\ReserveParameterBuilder
     */
    public function setDay(string $day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * @param string $month
     * @return \Beekalam\NiraGateway\ReserveParameterBuilder
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

    /**
     * @param string $edtLast1
     * @return ReserveParameterBuilder
     */
    public function setEdtLast1(string $edtLast1): ReserveParameterBuilder
    {
        $this->edtLast1 = $edtLast1;

        return $this;
    }

    public function addPassenger($edtID, $edtAge, $edtLast, $edtName)
    {
        $this->no++;
        $this->passengers [] = [
            "edtID{$this->no}" => $edtID,
            "edtAge{$this->no}" => $edtAge,
            "edtLast{$this->no}" => $edtLast,
            "edtName{$this->no}" => $edtName,
        ];
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
        Assert::notEmpty($this->edtName1, 'edtName1 can not be empty');
        Assert::notEmpty($this->edtLast1, 'edtLast1 can not be empty');
        Assert::notEmpty($this->edtAge1, 'edtAge1 can not be empty');
        Assert::notEmpty($this->edtID1, 'edtAge1 can not be empty');
        Assert::notEmpty($this->edtContact, 'edtContact can not be empty');

        $params = [
            'AirLine' => $this->airline,
            'cbSource' => $this->source,
            'cbTarget' => $this->target,
            'FlightClass' => $this->flightClass,
            'FlightNo' => $this->flightNo,
            'Day' => $this->day,
            'Month' => $this->month,
            'edtID1' => $this->edtID1,
            'edtAge1' => $this->edtAge1,
            'edtLast1' => $this->edtLast1,
            'edtName1' => $this->edtName1,
            'edtContact' => $this->edtContact,
            'No' => $this->no,
        ];

        foreach ($this->passengers as $passenger) {
            $params = array_merge($params, $passenger);
        }

        return $params;
    }

    public static function fromArray(array $reservationParams): ReserveParameterBuilder
    {
        $expected_keys = [
            'AirLine' => 'setAirline',
            'cbSource' => 'setSource',
            'cbTarget' => 'setTarget',
            'FlightClass' => 'setFlightClass',
            'FlightNo' => 'setFlightNo',
            'Day' => 'setDay',
            'Month' => 'setMonth',
            'edtName1' => 'setEdtName1',
            'edtLast1' => 'setEdtLast1',
            'edtAge1' => 'setEdtAge1',
            'edtID1' => 'setEdtID1',
            'edtContact' => 'setEdtContact',
        ];

        $sb = new ReserveParameterBuilder();
        foreach ($expected_keys as $k => $v) {
            if (array_key_exists($k, $reservationParams)) {
                $sb->{$v}($reservationParams[$k]);
            }
        }

        return $sb;
    }

    public function __debugInfo()
    {
        $ret = [
            'airline' => $this->airline,
            'source' => $this->source,
            'target' => $this->target,
            'flightClass' => $this->flightClass,
            'flightNo' => $this->flightNo,
            'day' => $this->day,
            'month' => $this->month,
            'edtName1' => $this->edtName1,
            'edtLast1' => $this->edtLast1,
            'edtAge1' => $this->edtAge1,
            'edtContact' => $this->edtContact,
        ];
        $ret['passengers'] = $this->passengers;

        return $ret;
    }
}
