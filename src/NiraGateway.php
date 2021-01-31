<?php

declare(strict_types=1);

namespace Beekalam\NiraGateway;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

class NiraGateway
{
    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var float|int
     */
    private $timeout;

    /**
     * @var string
     */
    private $availabilityURI;

    /**
     * @var string
     */
    private $fareURI;

    /**
     * @var bool
     */
    private $testing = false;

    /**
     * @var \GuzzleHttp\Handler\MockHandler|null
     */
    private $mock = null;

    /**
     * NiraGateway constructor.
     *
     * @param string $user
     * @param string $pass
     * @param string $availabilityURI
     * @param string $fareURI
     * @param float|int $timeout
     */
    public function __construct(
        $user,
        $pass,
        $availabilityURI = '',
        $fareURI = '',
        $timeout = Constants::GATEWAY_TIMEOUT
    ) {
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

    /**
     * @param \Beekalam\NiraGateway\ParameterBuilder $searchParamsBuilder
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search($searchParamsBuilder)
    {
        return $this->getClient()->request('GET', $this->buildAvailabilityURL($searchParamsBuilder))->getBody()->getContents();
    }

    /**
     * @param \Beekalam\NiraGateway\FareParameterBuilder $fb
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFlightFare($fb)
    {
        return $this->getClient()->request('GET', $this->buildFareURL($fb))->getBody()->getContents();
    }

    /**
     * @return \GuzzleHttp\Client
     */
    private function getClient()
    {
        if ($this->testing == true) {
            return $this->getTestingClient();
        }

        return $client = new Client([
            'base_uri' => $this->availabilityURI,
            'timeout' => $this->timeout,
        ]);
    }

    /**
     * @return \GuzzleHttp\Client
     */
    private function getTestingClient()
    {
        $handlerStack = HandlerStack::create($this->mock);
        $client = new Client(['handler' => $handlerStack]);

        return $client;
    }

    /**
     * @return mixed
     */
    protected function getTesting()
    {
        return $this->testing;
    }

    /**
     * @param bool $testing
     * @return NiraGateway
     */
    public function setTesting(bool $testing)
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

    /**
     * @param string $baseURL
     * @param array $queryParams
     * @return string
     */
    private function buildURL($baseURL, $queryParams)
    {
        return $baseURL.'?'.$this->buildQuery($queryParams);
    }

    /**
     * @param \Beekalam\NiraGateway\ParameterBuilder $pb
     * @return string
     */
    private function buildAvailabilityURL($pb)
    {
        return $this->buildURL($this->availabilityURI, $pb->buildParams());
    }

    /**
     * @param \Beekalam\NiraGateway\FareParameterBuilder $fb
     * @return string
     */
    private function buildFareURL($fb)
    {
        return $this->buildURL($this->fareURI, $fb->buildParams());
    }

    /**
     * @param array $queryParams
     * @return string
     */
    private function buildQuery($queryParams)
    {
        $params = array_merge($queryParams, [
            'OfficeUser' => $this->user,
            'OfficePass' => $this->pass,
        ]);

        return http_build_query($params);
    }
}
