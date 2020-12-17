<?php


namespace Beekalam\NiraGateway;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class ClientBuilder
{
    private $user;
    private $pass;
    private $testing = false;

    /**
     * ClientBuilder constructor.
     * @param $user
     * @param $pass
     */
    public function __construct($user, $pass)
    {

        $this->user = $user;
        $this->pass = $pass;
    }


    public function getClient()
    {
        return $client = new Client([
            'base_uri' => Constants::AVAILABILITY_URI,
            'timeout'  => Constants::GATEWAY_TIMEOUT
        ]);
    }

    public function buildURL(array $queryParams)
    {
        $query = http_build_query(
            array_merge($queryParams, [
                'officeUser'     => $this->user,
                'officePassword' => $this->pass
            ])
        );
        return Constants::AVAILABILITY_URI . '?' . $query;
    }

    /**
     * @return mixed
     */
    public function getTesting()
    {
        return $this->testing;
    }

    /**
     * @param bool $testing
     * @return ClientBuilder
     */
    public function setTesting(bool $testing): ClientBuilder
    {
        $this->testing = $testing;
        return $this;
    }

    public function getTestingClient(MockHandler $mock): Client
    {
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);
        return $client;
    }

}
