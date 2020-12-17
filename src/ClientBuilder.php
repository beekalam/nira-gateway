<?php


namespace Beekalam\NiraGateway;


use GuzzleHttp\Client;

class ClientBuilder
{
    private $user;
    private $pass;

    /**
     * ClientBuilder constructor.
     * @param $user
     * @param $pass
     */
    public function __construct($user, $pass)
    {

        $this->user = $user;
        $this->pass = $pass;
    }


    public function getClient()
    {
        return $client = new Client([
            'base_uri' => Constants::AVAILABILITY_URI,
            'timeout'  => Constants::GATEWAY_TIMEOUT
        ]);
    }

    public function buildURL(array $queryParams)
    {
        $query = http_build_query(
            array_merge($queryParams, [
                'officeUser'     => $this->user,
                'officePassword' => $this->pass
            ])
        );
        return Constants::AVAILABILITY_URI . '?' . $query;
    }

}
