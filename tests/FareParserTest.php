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
}
