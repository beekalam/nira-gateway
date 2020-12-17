<?php

namespace Beekalam\NiraGateway;

use GuzzleHttp\Client;

class NiraGateway
{
    protected $user;
    protected $pass;
    public const BASE_URI = 'http://api.parsair.ir/ws1';
    public const AVAILABILITY_URI = self::BASE_URI . "/AvailabilityJS.jsp";

    public function __construct($user, $pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }

    private function buildURL(array $queryParams)
    {
        $query = http_build_query(
            array_merge($queryParams, [
                'officeUser'     => $this->user,
                'officePassword' => $this->pass
            ])
        );
        return self::AVAILABILITY_URI . $query;
    }

    public function search($options)
    {

        $client = new Client([
            'base_uri' => self::AVAILABILITY_URI,
            'timeout'  => 5.0
        ]);

        $response = $client->request('GET', $this->buildURL($options));

        die($response);
        return $response;
    }
}
