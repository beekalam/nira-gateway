<?php

namespace Beekalam\NiraGateway;

class FareParser
{
    /**
     * @var array
     */
    private $arr;

    /**
     * @var string
     */
    private $infantTotalPrice;

    /**
     * @var string
     */
    private $infantFare;

    /**
     * @var string
     */
    private $childFare;

    /**
     * @var string
     */
    private $adultCommission;

    /**
     * @var string
     */
    private $adultFare;

    private $childTaxes;
    private $eligibilityText;
    private $adultTotalPrice;
    private $infantTaxes;
    private $CRCNRules;

    public function __construct($arr)
    {
        $this->arr = $arr;
        $this->infantTotalPrice = $arr['InfantTotalPrice'];
        $this->infantFare = $arr['InfantFare'];
        $this->childFare = $arr['ChildFare'];
        $this->adultCommission = $arr['AdultComission'];
    }

    /**
     * @return string
     */
    public function getInfantTotalPrice(): string
    {
        return $this->infantTotalPrice;
    }

    /**
     * @return string
     */
    public function getInfantFare(): string
    {
        return $this->infantFare;
    }

    /**
     * @return string
     */
    public function getChildFare(): string
    {
        return $this->childFare;
    }

    /**
     * @return string
     */
    public function getAdultCommission(): string
    {
        return $this->adultCommission;
    }

    /**
     * @return string
     */
    public function getAdultFare(): string
    {
        return $this->adultFare;
    }
}
