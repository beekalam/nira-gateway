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
    private int $timeout;
    private string $availabilityURI;
    private string $fareURI;
    private bool $testing = false;
    private ?MockHandler  $mock = null;

    public function __construct(string $user,
                                string $pass,
                                string $availabilityURI = '',
                                string $fareURI = '',
                                int $timeout = Constants::GATEWAY_TIMEOUT)
    {
        $this->user = $user;
        $this->pass = $pass;

        if (empty($availabilityURI)) {
            $this->availabilityURI = Constants::AVAILABILITY_URI;
        }

        if (empty($fareURI)) {
            $this->fareURI = Constants::FARE_URI;
        }

        $this->timeout = $timeout;
    }

    public function search(ParameterBuilder $searchParamsBuilder): string
    {
        $url = $this->buildURL($this->availabilityURI, $searchParamsBuilder->buildParams());

        $response = $this->getClient()
                         ->request('GET', $url);

        return $response->getBody()->getContents();
    }

    public function getFlightFare(FareParameterBuilder $fb): string
    {
        $url = $this->buildURL($this->fareURI, $fb->buildParams());
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
            'base_uri' => $this->availabilityURI,
            'timeout'  => $this->timeout
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
        return $this->availabilityURI . '?' . $this->buildQuery($queryParams);
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
