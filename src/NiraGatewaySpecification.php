<?php

namespace Beekalam\NiraGateway;

class NiraGatewaySpecification
{
    private $baseURL;

    private $availabilityURI;

    private $availabilityFareURI;

    private $fareURI;

    private $reserveURI;

    private $username;

    private $password;

    private $timeout;

    private $NRSBaseUrl;

    private $reserveTicketURI;

    /**
     * baseUrl is in form <domain_name>/WS1/
     * NRSBaseUrl is in form <domain_name>/WS2/cgi-bin/NRSWEB.cgi.
     *
     * @param $baseURL
     * @param $NRSBaseUrl
     * @param $username
     * @param $password
     */
    public function __construct($baseURL, $NRSBaseUrl, $username, $password)
    {
        $this->baseURL = $baseURL;
        $this->NRSBaseUrl = $NRSBaseUrl;
        $this->username = $username;
        $this->password = $password;
        $this->timeout = '5';

        $this->availabilityURI = 'AvailabilityJS.jsp';
        $this->availabilityFareURI = 'AvailabilityFareJS.jsp';
        $this->fareURI = 'FareJS.jsp';
        $this->reserveURI = 'ReservJS';
        $this->reserveTicketURI = 'NRSRT.jsp';
    }

    /**
     * @return mixed
     */
    public function getBaseURL()
    {
        return $this->baseURL;
    }

    /**
     * @param mixed $baseURL
     * @return NiraGatewaySpecification
     */
    public function setBaseURL($baseURL)
    {
        $this->baseURL = $baseURL;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvailabilityURI()
    {
        return $this->availabilityURI;
    }

    /**
     * @param mixed $availabilityURI
     */
    public function setAvailabilityURI($availabilityURI): void
    {
        $this->availabilityURI = $availabilityURI;
    }

    /**
     * @return mixed
     */
    public function getAvailabilityFareURI()
    {
        return $this->availabilityFareURI;
    }

    /**
     * @param mixed $availabilityFareURI
     */
    public function setAvailabilityFareURI($availabilityFareURI): void
    {
        $this->availabilityFareURI = $availabilityFareURI;
    }

    /**
     * @return mixed
     */
    public function getFareURI()
    {
        return $this->fareURI;
    }

    /**
     * @param mixed $fareURI
     */
    public function setFareURI($fareURI): void
    {
        $this->fareURI = $fareURI;
    }

    /**
     * @return mixed
     */
    public function getReserveURI()
    {
        return $this->reserveURI;
    }

    /**
     * @param mixed $reserveURI
     */
    public function setReserveURI($reserveURI): void
    {
        $this->reserveURI = $reserveURI;
    }

    public function getAvailabilityURL()
    {
        return $this->baseURL.'/'.$this->getAvailabilityURI();
    }

    public function getAvailabilityFareURL()
    {
        return $this->baseURL.'/'.$this->getAvailabilityFareURI();
    }

    public function getFareURL()
    {
        return $this->baseURL.'/'.$this->getFareURI();
    }

    public function getReserveURL()
    {
        return $this->NRSBaseUrl.'/'.$this->getReserveURI();
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $username
     * @return NiraGatewaySpecification
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param mixed $password
     * @return NiraGatewaySpecification
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param mixed $timeout
     */
    public function setTimeout($timeout): void
    {
        $this->timeout = $timeout;
    }

    /**
     * @param mixed $NRSBaseUrl
     * @return NiraGatewaySpecification
     */
    public function setNRSBaseUrl($NRSBaseUrl)
    {
        $this->NRSBaseUrl = $NRSBaseUrl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNRSBaseUrl()
    {
        return $this->NRSBaseUrl;
    }

    public function getReserveTicketURL()
    {
        return $this->baseURL.'/'.$this->reserveTicketURI;
    }

    /**
     * @return string
     */
    public function getReserveTicketURI(): string
    {
        return $this->reserveTicketURI;
    }
}
