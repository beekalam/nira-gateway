<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\NiraGatewaySpecification;

class NiraGateWaySpecificationTest extends BaseTestCase
{
    /** @test */
    function test_it_should_have_base_url_set_correctly()
    {
        $ngs = new NiraGatewaySpecification($baseurl = 'http://api.somedomain.com/ws');

        $this->assertNotEmpty($ngs->getBaseURL());
        $this->assertEquals($baseurl, $ngs->getBaseURL());
    }

    /** @test */
    function test_endpoints_should_have_a_default_value()
    {
        $ngs = new NiraGatewaySpecification($baseurl = 'http://api.somedomain.com/ws');

        $this->assertNotEmpty($ngs->getFareURI());
        $this->assertNotEmpty($ngs->getAvailabilityFareURI());
        $this->assertNotEmpty($ngs->getAvailabilityURI());
        $this->assertNotEmpty($ngs->getReserveURI());
    }

    /** @test */
    function test_should_create_correct_availability_url()
    {
        $ngs = new NiraGatewaySpecification($baseurl = 'http://api.somedomain.com/ws');

        $this->assertEquals($baseurl."/".$ngs->getAvailabilityURI(), $ngs->getAvailabilityURL());
    }

    /** @test */
    function test_should_create_correct_availabilityfare_url()
    {

        $ngs = new NiraGatewaySpecification($baseurl = 'http://api.somedomain.com/ws');

        $this->assertEquals($baseurl."/".$ngs->getAvailabilityFareURI(), $ngs->getAvailabilityFareURL());
    }

    /** @test */
    function test_should_create_correct_fare_url()
    {

        $ngs = new NiraGatewaySpecification($baseurl = 'http://api.somedomain.com/ws');

        $this->assertEquals($baseurl."/".$ngs->getFareURI(), $ngs->getFareURL());
    }

    /** @test */
    function test_should_create_correct_reserve_url()
    {

        $ngs = new NiraGatewaySpecification($baseurl = 'http://api.somedomain.com/ws');

        $this->assertEquals($baseurl."/".$ngs->getReserveURI(), $ngs->getReserveURL());
    }
}
