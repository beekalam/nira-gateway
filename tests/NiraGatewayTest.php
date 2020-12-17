<?php

namespace Beekalam\NiraGateway\Tests;

use Beekalam\NiraGateway\ClientBuilder;
use Beekalam\NiraGateway\NiraGateway;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class NiraGatewayTest extends TestCase
{
    /** @test */
    public function true_is_true()
    {
        $ng = new NiraGateway('test', 'password');
        $this->assertNotNull($ng);
    }

    /** @test */
    public function can_search_flights()
    {
        $ng = new NiraGateway('test', 'password');
        $options = [
            'airline'     => 'PA',
            'cbSource'    => 'ugt',
            'cbTarget'    => 'ttq',
            'cbDay1'      => '3',
            'cbMonth1'    => '06',
            'cbAdultQty'  => '1',
            'cbInfantQty' => '0',
        ];
        $res = $ng->search($options);
        $this->assertNotNull($res);
    }

    /** @test */
    function client_builder_should_return_mock_requests()
    {
        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar'], 'Hello, World'),
            new Response(202, ['Content-Length' => 0]),
        ]);
        $client = new ClientBuilder('user', 'pass');
        $client = $client->getTestingClient($mock);
        $response = $client->request('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Hello, World', $response->getBody());
    }

}
