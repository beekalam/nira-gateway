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

        $response = $this->getClient()->request('GET', $fareURL);
        $body = $response->getBody()->getContents();
        if ($this->hasWindows1256Encoding($response)) {
            $body = iconv('WINDOWS-1256', 'UTF-8', $body);
        }

        return $body;
    }

    private function hasWindows1256Encoding($request)
    {
        $header = $request->getHeader('Content-Type');

        return ! empty($header) && strpos(strtolower($header[0]), "windows-1256") !== false;
    }

    public function reserve(ReserveParameterBuilder $rp)
    {
        $reserveURL = $this->buildURL($this->niraGatewaySpecification->getReserveURL(), $rp->buildParams());
        $request = $this->getClient()->request('POST', $reserveURL);

        return $request->getBody()->getContents();
    }

    public function getReserveTicketInfo(ReserveTicketParameterBuilder $reserveTicketParameterBuilder)
    {
        $reserveInfoUrl = $this->buildURL($this->niraGatewaySpecification->getReserveTicketURL(), $reserveTicketParameterBuilder->buildParams());
        $request = $this->getClient()->request('GET', $reserveInfoUrl);

        return $request->getBody()->getContents();
    }

    public function ETIssue(string $airline, string $pnr, string $email)
    {
        $params = [
            'Airline' => $airline,
            'PNR' => $pnr,
            'Email' => $email,
        ];
        $buyURL = $this->buildURL($this->niraGatewaySpecification->getEtIssueURL(), $params);
        $request = $this->getClient()->request('GET', $buyURL);

        $body = $request->getBody()->getContents();

        return str_replace("\r\n", '', $body);
    }

    public function ETR($airline, $ticketno)
    {
        $params = [
            'AirLine' => $airline,
            'TicketNo' => $ticketno,
        ];
        $etrURL = $this->buildURL($this->niraGatewaySpecification->getEtrURL(), $params);
        $request = $this->getClient()->request('GET', $etrURL);

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
            'timeout' => $this->niraGatewaySpecification->getTimeout(),
            'headers' => [
                'Content-Type' => 'application/json; charset=utf-8',
                'Accept' => 'application/json; charset=utf-8',
            ],
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
        $ret = $baseURL.'?'.$this->buildQuery($queryParams);

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
