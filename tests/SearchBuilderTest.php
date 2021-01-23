<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\ClientBuilder;
use Beekalam\NiraGateway\SearchParamsBuilder;
use PHPUnit\Framework\TestCase;

class SearchBuilderTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }


    /** @test */
    public function searchBuilder_can_generate_acceptable_array_for_search_in_Niragatewayclass()
    {
        $options = [
            'airline'     => 'PA',
            'cbSource'    => 'ugt',
            'cbTarget'    => 'ttq',
            'cbDay1'      => '3',
            'cbMonth1'    => '06',
            'cbAdultQty'  => '1',
            'cbInfantQty' => '0',
        ];

        $sb = new SearchParamsBuilder();
        $sb->setAirline('PA')
           ->setSource('ugt')
           ->setTarget('ttq')
           ->setDay('3')
           ->setMonth('06')
           ->setAdultCount('1')
           ->setInfantCount('0');

        $this->assertEquals($options, $sb->buildParams());
    }

}
