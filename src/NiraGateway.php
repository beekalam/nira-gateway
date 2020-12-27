<?php

namespace Beekalam\NiraGateway;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

class NiraGateway
{

    private $user;
    private $pass;
    private $testing = false;
    private $mock = null;

    public function __construct($user, $pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }

    public function search($options)
    {
        $response = $this->getClient()
                         ->request('GET',
                             $this->buildURL(Constants::AVAILABILITY_URI, $options));

        return $response->getBody();
    }

    public function getFlightFare($options)
    {
        $response = $this->getClient()
                         ->request('GET', $this->buildURL(Constants::FARE_URI, $options));

        return $response->getBody();
    }

    private function getClient()
    {
        if ($this->testing == true) {
            return $this->getTestingClient();
        }
        return $client = new Client([
            'base_uri' => Constants::AVAILABILITY_URI,
            'timeout'  => Constants::GATEWAY_TIMEOUT
        ]);
    }

    private function getTestingClient(): Client
    {
        $handlerStack = HandlerStack::create($this->mock);
        $client = new Client(['handler' => $handlerStack]);
        return $client;
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
     * @return NiraGateway
     */
    public function setTesting(bool $testing): NiraGateway
    {
        $this->testing = $testing;
        return $this;
    }

    /**
     * @param null $mock
     * @return NiraGateway
     */
    public function setMock($mock)
    {
        $this->mock = $mock;
        return $this;
    }

    public function buildURL($baseURL, array $queryParams)
    {
        return Constants::AVAILABILITY_URI . '?' . $this->buildQuery($queryParams);
    }

    public function buildQuery(array $queryParams)
    {
        return http_build_query(
            array_merge($queryParams, [
                'officeUser' => $this->user,
                'officePass' => $this->pass
            ])
        );
    }
}
