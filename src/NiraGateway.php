<?php
declare(strict_types=1);

namespace Beekalam\NiraGateway;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;

class NiraGateway
{

    private string $user;
    private string $pass;
    private bool $testing = false;
    private ?MockHandler  $mock = null;

    public function __construct(string $user, string $pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }

    public function search(ParameterBuilder $searchParamsBuilder): string
    {
        $url = $this->buildURL(Constants::AVAILABILITY_URI, $searchParamsBuilder->buildParams());

        $response = $this->getClient()
                         ->request('GET', $url);

        return $response->getBody()->getContents();
    }

    public function getFlightFare(FareParameterBuilder $fb): string
    {
        $url = $this->buildURL(Constants::FARE_URI, $fb->buildParams());
        $response = $this->getClient()
                         ->request('GET', $url);

        return $response->getBody()->getContents();
    }

    private function getClient(): Client
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
    public function getTesting(): bool
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
    public function setMock($mock): NiraGateway
    {
        $this->mock = $mock;
        return $this;
    }

    public function buildURL(string $baseURL, array $queryParams): string
    {
        return Constants::AVAILABILITY_URI . '?' . $this->buildQuery($queryParams);
    }

    public function buildQuery(array $queryParams): string
    {
        $params = array_merge($queryParams, [
            'OfficeUser' => $this->user,
            'OfficePass' => $this->pass
        ]);

        return http_build_query($params);
    }
}
