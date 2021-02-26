<?php

namespace Beekalam\NiraGateway;

class NiraGatewaySpecification
{
    private $baseURL;

    private $NRSBaseUrl;

    private $availabilityURI;

    private $availabilityFareURI;

    private $fareURI;

    private $reserveURI;

    private $username;

    private $password;

    private $timeout;

    private $reserveTicketURI;

    private $etIssueURI;

    private $etrURI;

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
        $this->timeout = '8';

        $this->availabilityURI = 'AvailabilityJS.jsp';
        $this->availabilityFareURI = 'AvailabilityFareJS.jsp';
        $this->fareURI = 'FareJS.jsp';
        $this->reserveURI = 'ReservJS';
        $this->reserveTicketURI = 'NRSRT.jsp';
        $this->etIssueURI = 'ETIssueJS';
        $this->etrURI = 'NRSETR.jsp';
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

    /**
     * @return string
     */
    public function getEtIssueURI(): string
    {
        return $this->etIssueURI;
    }

    public function getEtIssueURL()
    {
        return $this->NRSBaseUrl.'/'.$this->getEtIssueURI();
    }

    /**
     * @return mixed
     */
    public function getEtrURI()
    {
        return $this->etrURI;
    }

    public function getEtrURL()
    {
        return $this->baseURL."/".$this->etrURI;
    }

    /**
     * @param string $etrURI
     */
    public function setEtrURI(string $etrURI): void
    {
        $this->etrURI = $etrURI;
    }

    /**
     * @param string $etIssueURI
     */
    public function setEtIssueURI(string $etIssueURI): void
    {
        $this->etIssueURI = $etIssueURI;
    }

    /**
     * @param string $reserveTicketURI
     */
    public function setReserveTicketURI(string $reserveTicketURI): void
    {
        $this->reserveTicketURI = $reserveTicketURI;
    }
}
