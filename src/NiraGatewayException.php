<?php

namespace Beekalam\NiraGateway;

class NiraGatewayException extends \Exception
{
    /**
     * When there's an internal server error on Nira API side
     * It spits out the username and password.
     * This will be the \GuzzleHttp\RequestException that is throw
     * @var
     */
    private $gatewayError;

    /**
     * @return mixed
     */
    public function getGatewayError()
    {
        return $this->gatewayError;
    }

    /**
     * @param mixed $gatewayError
     */
    public function setGatewayError($gatewayError): void
    {
        $this->gatewayError = $gatewayError;
    }
}
