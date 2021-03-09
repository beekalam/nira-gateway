<?php

namespace Beekalam\NiraGateway;

class ReserveTicketParser
{
    public $data;

    private $totalPrice;

    private $contact;

    private $segments;

    private $childTP;

    private $infantTP;

    private $adultTP;

    private $tickets;

    private $docs;

    private $adultQTY;

    private $childQTY;

    private $infantQTY;

    private $status;

    private $office;

    /**
     * ReserveTicketParser constructor.
     */
    public function __construct($data)
    {
        $this->data = $data;

        $this->adultQTY = $data['AdultQTY'];
        $this->childQTY = $data['ChildQTY'];
        $this->infantQTY = $data['InfantQTY'];

        $this->totalPrice = $data['TotalPrice'];
        $this->infantTP = $data['InfantTP'];
        $this->adultTP = $data['AdultTP'];
        $this->childTP = $data['ChildTP'];

        $this->contact = $data['Contact'];
        if (isset($data['Segments'])) {
            $this->segments = $data['Segments'];
        }

        $this->tickets = $data['Tickets'];
        $this->docs = $data['DOCS'];

        $this->status = $data['Status'];
        $this->office = $data['Office'];
    }

    /**
     * @return string
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @return string
     */
    public function getSegments()
    {
        return $this->segments;
    }

    /**
     * @return string
     */
    public function getChildTP()
    {
        return $this->childTP;
    }

    /**
     * @return string
     */
    public function getInfantTP()
    {
        return $this->infantTP;
    }

    /**
     * @return string
     */
    public function getAdultTP()
    {
        return $this->adultTP;
    }

    /**
     * @return string
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * @return string
     */
    public function getDocs()
    {
        return $this->docs;
    }

    /**
     * @return string
     */
    public function getAdultQTY()
    {
        return $this->adultQTY;
    }

    /**
     * @return string
     */
    public function getChildQTY()
    {
        return $this->childQTY;
    }

    /**
     * @return string
     */
    public function getInfantQTY()
    {
        return $this->infantQTY;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getOffice()
    {
        return $this->office;
    }

    /**
     * @return ReserveTicketParser
     */
    public static function fromJson($requestBody)
    {
        return new self(json_decode($requestBody, true));
    }
}
