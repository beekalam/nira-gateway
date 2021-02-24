<?php

declare(strict_types=1);

namespace Beekalam\NiraGateway;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

class NiraGateway
{
    /**
     * @var bool
     */
    private $testing = false;

    /**
     * @var \GuzzleHttp\Handler\MockHandler|null
     */
    private $mock = null;

    /**
     * @var \Beekalam\NiraGateway\NiraGatewaySpecification
     */
    private $niraGatewaySpecification;

    /**
     * NiraGateway constructor.
     *
     * @param \Beekalam\NiraGateway\NiraGatewaySpecification $niraGatewaySpecification
     */
    public function __construct(NiraGatewaySpecification $niraGatewaySpecification)
    {
        $this->niraGatewaySpecification = $niraGatewaySpecification;
    }

    /**
     * @param \Beekalam\NiraGateway\ParameterBuilder $searchParamsBuilder
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search($searchParamsBuilder)
    {
        $client = $this->getClient();

        $availabilityURL = $this->buildURL($this->niraGatewaySpecification->getAvailabilityURL(), $searchParamsBuilder->buildParams());

        return $client->request('GET', $availabilityURL)->getBody()->getContents();
    }

    /**
     * @param \Beekalam\NiraGateway\FareParameterBuilder $fb
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAvailabilityFare($fb)
    {
        $client = $this->getClient();
        $fareURL = $this->buildURL($this->niraGatewaySpecification->getFareURL(), $fb->buildParams());

        return $client->request('GET', $fareURL)->getBody()->getContents();
    }

    public function getFare(FareParameterBuilder $fb)
    {
        $fareURL = $this->buildURL($this->niraGatewaySpecification->getFareURL(), $fb->buildParams());

        return $this->getClient()->request('GET', $fareURL)->getBody()->getContents();
    }

    public function reserve(ReserveParameterBuilder $rp)
    {
        $reserveURL = $this->buildURL($this->niraGatewaySpecification->getReserveURL(), $rp->buildParams());
        $request = $this->getClient()->request('GET', $reserveURL);

        return $request->getBody()->getContents();
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
            // 'base_uri' => $this->niraGatewaySpecification->getAvailabilityURL(),
            'timeout' => $this->niraGatewaySpecification->getTimeout(),
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
        $ret =  $baseURL.'?'.$this->buildQuery($queryParams);
        return $ret;
    }

    /**
     * @param array $queryParams
     * @return string
     */
    private function buildQuery($queryParams)
    {
        $params = array_merge($queryParams, [
            'OfficeUser' => $this->niraGatewaySpecification->getUsername(),
            'OfficePass' => $this->niraGatewaySpecification->getPassword(),
        ]);

        return http_build_query($params);
    }
}
