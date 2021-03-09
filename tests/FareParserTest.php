<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\FareParser;

class FareParserTest extends BaseTestCase
{
    /**
     * @var array
     */
    private $fareResults;

    /**
     * @var FareParser
     */
    private $fareParser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fareResults = json_decode($this->getFareResults(), true);
        $this->fareParser = new FareParser($this->fareResults);
    }

    /** @test */
    public function it_can_return_infantTotalPrice()
    {
        $this->assertEquals($this->fareParser->getInfantTotalPrice(), $this->fareResults['InfantTotalPrice']);
    }

    /** @test */
    public function it_can_return_infantFare()
    {
        $this->assertEquals($this->fareParser->getInfantFare(), $this->fareResults['InfantFare']);
    }

    /** @test */
    public function it_can_return_childFare()
    {
        $this->assertEquals($this->fareParser->getChildFare(), $this->fareResults['ChildFare']);
    }

    /** @test */
    public function it_can_return_AdultCommission()
    {
        $this->assertEquals($this->fareParser->getAdultCommission(), $this->fareResults['AdultComission']);
    }

    /** @test */
    public function it_can_return_AdultFare()
    {
        $this->assertEquals($this->fareParser->getAdultFare(), $this->fareResults['AdultFare']);
    }

    /** @test */
    public function it_can_return_child_taxes()
    {
        $this->assertEquals($this->fareParser->getChildTaxes(), $this->fareResults['ChildTaxes']);
    }

    /** @test */
    public function it_can_return_eligibilityText()
    {
        $this->assertEquals($this->fareParser->getEligibilityText(), $this->fareResults['EligibilityText']);
    }

    /** @test */
    public function it_can_return_AdultTotalPrice()
    {
        $this->assertEquals($this->fareParser->getAdultTotalPrice(), $this->fareResults['AdultTotalPrice']);
    }

    /** @test */
    function it_can_return_ChildTotalPrice()
    {
        $this->assertEquals($this->fareParser->getChildTotalPrice(), $this->fareResults['ChildTotalPrice']);
    }

    /** @test */
    public function it_can_return_InfantTaxes()
    {
        $this->assertEquals($this->fareParser->getInfantTaxes(), $this->fareResults['InfantTaxes']);
    }

    /** @test */
    public function it_can_return_CRCNRules()
    {
        $this->assertEquals($this->fareParser->getCRCNRules(), $this->fareResults['CRCNRules']);
    }

    /** @test */
    public function it_can_return_CRNCRules_array()
    {
        $fareCRNCFormatted = $this->fareParser->getCRNCRulesArray();
        //var_dump($this->fareParser->getCRNCRulesArray());
        //var_dump(array_keys($this->fareParser->getCRNCRulesArray()));
        $this->assertTrue(is_array($fareCRNCFormatted));

        $keys = array_keys($fareCRNCFormatted);
        //var_dump($keys);
        $this->assertTrue(in_array('50', $keys));
        $this->assertTrue(in_array('30', $keys));
        $this->assertTrue(in_array('40', $keys));
    }

    /** @test */
    public function it_can_calculate_ticket_price_correctly_for_an_adult()
    {
        $this->assertEquals($this->fareParser->getAdultTotalPrice() * 1, $this->fareParser->calculatePrice(1, 0, 0));
    }

    /** @test */
    public function it_can_calculate_ticket_price_correctly_for_adult_child()
    {
        $expected = $this->fareParser->getAdultTotalPrice() * 1 + $this->fareParser->getChildTotalPrice() * 2;
        $this->assertEquals($expected, $this->fareParser->calculatePrice(1, 2, 0));
    }

    /** @test */
    function it_can_calculate_infant_price_correctly_for_adult_child_infant()
    {
        $expected = $this->fareParser->getAdultTotalPrice() * 1 + $this->fareParser->getChildTotalPrice() * 2 + $this->fareParser->getInfantTotalPrice() * 2;
        $this->assertEquals($expected, $this->fareParser->calculatePrice(1, 2, 2));
    }
}
