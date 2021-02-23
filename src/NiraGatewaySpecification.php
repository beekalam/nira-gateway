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

    /**
     * NiraGatewaySpecification constructor.
     *
     * @param $baseURL
     * @param $username
     * @param $password
     */
    public function __construct($baseURL, $username, $password)
    {
        $this->baseURL = $baseURL;
        //todo: fix
        $this->availabilityURI = 'AvailabilityFareJS.jsp';
        $this->availabilityFareURI = 'AvailabilityFareJS.jsp';
        $this->fareURI = 'FareJS.jsp';
        $this->reserveURI = 'ReserveJS';
        $this->username = $username;
        $this->password = $password;
        $this->timeout = '5';
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
        return $this->baseURL.'/'.$this->getReserveURI();
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
}
