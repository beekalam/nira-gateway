<?php

namespace Beekalam\NiraGateway;

class NiraGateway
{

    /**
     * @var ClientBuilder
     */
    private ClientBuilder $clientBuilder;

    public function __construct(ClientBuilder $client)
    {
        $this->clientBuilder = $client;
    }

    public function search($options)
    {

        $response = $this->clientBuilder
            ->getClient()
            ->request('GET', $this->clientBuilder->buildURL($options));

        die($response);
        return $response;
    }

}
