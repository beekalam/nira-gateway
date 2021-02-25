<?php

namespace Beekalam\NiraGateway;

class ETIssueParser
{
    private $data;

    private $tickets;

    private $successfulETIssue = false;

    private $message;

    public function __construct($ETIssueResults)
    {
        $this->data = $ETIssueResults;

        if (is_array($ETIssueResults) && array_key_exists('AirNRSTICKETS', $ETIssueResults)) {
            $this->successfulETIssue = true;
            $this->tickets = $ETIssueResults['AirNRSTICKETS'][0]['Tickets'];
            $this->message = $ETIssueResults['Message'];
        }
    }

    /**
     * @return mixed
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * @return bool
     */
    public function isSuccessfulETIssue(): bool
    {
        return $this->successfulETIssue;
    }
}