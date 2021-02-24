<?php

namespace Beekalam\NiraGateway;

use Webmozart\Assert\Assert;

class ReserveTicketParameterBuilder
{
    private $airline;

    private $pnr;

    private $complete;

    /**
     * ReserveTicketParameterBuilder constructor.
     *
     * @param $airline
     * @param $pnr
     * @param $complete
     */
    public function __construct($airline, $pnr)
    {
        $this->airline = $airline;
        $this->pnr = $pnr;
    }

    /**
     * @return mixed
     */
    public function getAirline()
    {
        return $this->airline;
    }

    /**
     * @param mixed $airline
     * @return ReserveTicketParameterBuilder
     */
    public function setAirline($airline)
    {
        $this->airline = $airline;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPnr()
    {
        return $this->pnr;
    }

    /**
     * @param mixed $pnr
     * @return ReserveTicketParameterBuilder
     */
    public function setPnr($pnr)
    {
        $this->pnr = $pnr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getComplete()
    {
        return $this->complete;
    }

    /**
     * @param mixed $complete
     * @return ReserveTicketParameterBuilder
     */
    public function setComplete($complete)
    {
        $this->complete = $complete;

        return $this;
    }

    public static function fromArray($inputs)
    {
        Assert::inArray('Airline', array_keys($inputs), 'Airline can not be empty');
        Assert::inArray('PNR', array_keys($inputs), 'PNR can not be empty');
        $rt = new self($inputs['Airline'], $inputs['PNR']);
        if (isset($inputs['Complete'])) {
            $rt->setComplete($inputs['Complete']);
        }

        return $rt;
    }

    public function buildParams()
    {
        Assert::notEmpty($this->airline, 'Airline Can not be empty');
        Assert::notEmpty($this->pnr, 'PNR can not be empty');

        $res = [
            'Airline' => $this->getAirline(),
            'PNR' => $this->getPnr(),
        ];

        if (! empty($this->complete)) {
            $res['Complete'] = 'Y';
        }

        return $res;
    }
}
