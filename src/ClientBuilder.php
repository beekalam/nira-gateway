<?php


namespace Beekalam\NiraGateway;


use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

class ClientBuilder
{
    private $user;
    private $pass;
    private $testing = false;
    private $mock = null;

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
        if ($this->testing == true) {
            return $this->getTestingClient();
        }
        return $client = new Client([
            'base_uri' => Constants::AVAILABILITY_URI,
            'timeout'  => Constants::GATEWAY_TIMEOUT
        ]);
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

    public function getTestingClient(): Client
    {
        $handlerStack = HandlerStack::create($this->mock);
        $client = new Client(['handler' => $handlerStack]);
        return $client;
    }

    /**
     * @param null $mock
     * @return ClientBuilder
     */
    public function setMock($mock)
    {
        $this->mock = $mock;
        return $this;
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

}
