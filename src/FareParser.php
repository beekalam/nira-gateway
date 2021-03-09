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
    private $adultTotalPrice;

    /**
     * @var string
     */
    private $childTotalPrice;

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
    private $infantTaxes;

    /**
     * @var string
     */
    private $CRCNRules;

    /**
     * @var string
     */
    private $eligibilityText;

    public function __construct($arr)
    {
        $this->arr = $arr;
        $this->adultTotalPrice = $arr['AdultTotalPrice'];
        $this->childTotalPrice = $arr['ChildTotalPrice'];
        $this->infantTotalPrice = $arr['InfantTotalPrice'];

        $this->adultFare = $arr['AdultFare'];
        $this->infantFare = $arr['InfantFare'];
        $this->childFare = $arr['ChildFare'];

        $this->adultCommission = $arr['AdultComission'] ?? null;

        $this->childTaxes = $arr['ChildTaxes'];
        $this->infantTaxes = $arr['InfantTaxes'];

        $this->eligibilityText = $arr['EligibilityText'];
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
     * @return string
     */
    public function getChildTaxes()
    {
        return $this->childTaxes;
    }

    /**
     * @return string
     */
    public function getEligibilityText()
    {
        return $this->eligibilityText;
    }

    /**
     * @return string
     */
    public function getAdultTotalPrice()
    {
        return $this->adultTotalPrice;
    }

    /**
     * @return string
     */
    public function getInfantTaxes()
    {
        return $this->infantTaxes;
    }

    /**
     * @return string
     */
    public function getCRCNRules()
    {
        return $this->CRCNRules;
    }

    /**
     * @return string
     */
    public function getChildTotalPrice(): string
    {
        return $this->childTotalPrice;
    }

    /**
     * @return array
     */
    public function getCRNCRulesArray()
    {
        $res = preg_split("/,P\//", $this->getCRCNRules());
        $ret = [];

        foreach ($res as $r) {
            if (strpos($r, ',') !== false) {
                [$description, $percent] = explode(',', $r);
                $ret[$percent] = $description;
            }
        }
        ksort($ret);

        return $ret;
    }

    public static function fromJson(string $requestBody)
    {
        return new self(json_decode($requestBody, true));
    }

    public function calculatePrice($adult, $child, $infant)
    {
        return ($this->getAdultTotalPrice() * $adult) + ($this->getChildTotalPrice() * $child) + ($this->getInfantTotalPrice() * $infant);
    }
}
