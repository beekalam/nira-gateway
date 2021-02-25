<?php

namespace Beekalam\NiraGateway;

class ReserveParser
{
    public $data;

    /**
     * @var string
     */
    private $error;

    /**
     * @var string
     */
    private $pnr;

    private $successfulReserve = false;

    public function __construct($reserveResults)
    {
        $this->data = $reserveResults;

        if (strtolower($reserveResults['AirReserve'][0]['Error']) == 'no err') {
            $this->successfulReserve = true;
            $this->pnr = $reserveResults['AirReserve'][0]['PNR'];
        }

        $this->error = $reserveResults['AirReserve'][0]['Error'];
    }

    public function isSuccessful()
    {
        return $this->successfulReserve;
    }

    /**
     * @return string
     */
    public function getPnr(): string
    {
        return $this->pnr;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }
}
