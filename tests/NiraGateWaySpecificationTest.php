<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\NiraGatewaySpecification;

class NiraGateWaySpecificationTest extends BaseTestCase
{
    /**
     * @var \Beekalam\NiraGateway\NiraGatewaySpecification
     */
    private $ngs;

    private $baseurl = 'http://api.somedomain.com/ws';

    protected function setUp(): void
    {
        parent::setUp();
        $this->ngs = new NiraGatewaySpecification($this->baseurl, 'user', 'pass');
    }

    /** @test */
    function test_it_should_have_base_url_set_correctly()
    {

        $this->assertNotEmpty($this->ngs->getBaseURL());
        $this->assertEquals($this->baseurl, $this->ngs->getBaseURL());
    }

    /** @test */
    function test_endpoints_should_have_a_default_value()
    {

        $this->assertNotEmpty($this->ngs->getFareURI());
        $this->assertNotEmpty($this->ngs->getAvailabilityFareURI());
        $this->assertNotEmpty($this->ngs->getAvailabilityURI());
        $this->assertNotEmpty($this->ngs->getReserveURI());
    }

    /** @test */
    function test_should_create_correct_availability_url()
    {

        $this->assertEquals($this->baseurl."/".$this->ngs->getAvailabilityURI(), $this->ngs->getAvailabilityURL());
    }

    /** @test */
    function test_should_create_correct_availabilityfare_url()
    {


        $this->assertEquals($this->baseurl."/".$this->ngs->getAvailabilityFareURI(), $this->ngs->getAvailabilityFareURL());
    }

    /** @test */
    function test_should_create_correct_fare_url()
    {


        $this->assertEquals($this->baseurl."/".$this->ngs->getFareURI(), $this->ngs->getFareURL());
    }

    /** @test */
    function test_should_create_correct_reserve_url()
    {
        $this->assertEquals($this->baseurl."/".$this->ngs->getReserveURI(), $this->ngs->getReserveURL());
    }
}
