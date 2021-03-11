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
        $this->tickets = [];

        if (is_array($ETIssueResults) && array_key_exists('AirNRSTICKETS', $ETIssueResults)) {
            $this->successfulETIssue = true;
            $tickets = $ETIssueResults['AirNRSTICKETS'][0]['Tickets'];
            /*
             * converts this:
             * doe/john=1012400000680jane/doe=1012400000681uncle/sam=1012400000682
             * to this:
             * doe/john=1012400000680 jane/doe=1012400000681 uncle/sam=1012400000682
             */
            $tickets = preg_replace("@(\w*/\w*=\d*)@", '$1 ', $tickets);
            $tickets = explode(' ', trim($tickets));
            foreach ($tickets as $ticket) {
                [$name, $ticketno] = explode('=', $ticket);
                $this->tickets[] = [
                    'name' => str_replace('/', ' ', $name),
                    'ticketno' => $ticketno,
                ];
            }

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

    /**
     * @param string $requestBody
     * @return \Beekalam\NiraGateway\ETIssueParser
     */
    public static function fromJson($requestBody)
    {
        return new self(json_decode($requestBody, true));
    }
}
