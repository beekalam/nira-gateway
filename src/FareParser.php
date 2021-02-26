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

    /**
     * @var string
     */
    private $childTaxes;

    /**
     * @var string
     */
    private $eligibilityText;

    /**
     * @var string
     */
    private $adultTotalPrice;

    /**
     * @var string
     */
    private $infantTaxes;

    /**
     * @var string
     */
    private $CRCNRules;

    public function __construct($arr)
    {
        $this->arr = $arr;
        $this->infantTotalPrice = $arr['InfantTotalPrice'];
        $this->infantFare = $arr['InfantFare'];
        $this->childFare = $arr['ChildFare'];
        $this->adultCommission = $arr['AdultComission'];
        $this->adultFare = $arr['AdultFare'];
        $this->childTaxes = $arr['ChildTaxes'];
        $this->eligibilityText = $arr['EligibilityText'];
        $this->adultTotalPrice = $arr['AdultTotalPrice'];
        $this->infantTaxes = $arr['InfantTaxes'];
        $this->CRCNRules = $arr['CRCNRules'];
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

    /**
     * @return mixed
     */
    public function getChildTaxes()
    {
        return $this->childTaxes;
    }

    /**
     * @return mixed
     */
    public function getEligibilityText()
    {
        return $this->eligibilityText;
    }

    /**
     * @return mixed
     */
    public function getAdultTotalPrice()
    {
        return $this->adultTotalPrice;
    }

    /**
     * @return mixed
     */
    public function getInfantTaxes()
    {
        return $this->infantTaxes;
    }

    /**
     * @return mixed
     */
    public function getCRCNRules()
    {
        return $this->CRCNRules;
    }

    public static function fromJson(string $requestBody)
    {
        return new self(json_decode($requestBody, true));
    }
}
