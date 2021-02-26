<?php

namespace Beekalam\NiraGateway\Tests;

class ETRParser
{
    public $data;

    private $passengerFullName;

    private $PAX;

    private $totalPrice;

    private $taxes;

    private $ticketNO;

    private $commission;

    private $history;

    private $coupons;

    private $fare;

    /**
     * ETRParser constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->passengerFullName = $data['PassengerFullName'];
        $this->PAX = $data['PAX'];
        $this->totalPrice = $data['TotalPrice'];
        $this->taxes = $data['TAXES'];
        $this->ticketNO = $data['TicketNo'];
        $this->commission = $data['Comission'];
        $this->history = $data['History'];
        $this->coupons = $data['COUPONS'];

        $this->fare = $data['Fare'];
    }

    /**
     * @return mixed
     */
    public function getPassengerFullName()
    {
        return $this->passengerFullName;
    }

    /**
     * @return mixed
     */
    public function getPAX()
    {
        return $this->PAX;
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * @return mixed
     */
    public function getTaxes()
    {
        return $this->taxes;
    }

    /**
     * @return mixed
     */
    public function getTicketNO()
    {
        return $this->ticketNO;
    }

    /**
     * @return mixed
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * @return mixed
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * @return mixed
     */
    public function getCoupons()
    {
        return $this->coupons;
    }

    /**
     * @return mixed
     */
    public function getFare()
    {
        return $this->fare;
    }
}
