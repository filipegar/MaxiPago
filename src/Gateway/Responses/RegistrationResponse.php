<?php

namespace Filipegar\Maxipago\Gateway\Responses;

use Filipegar\Maxipago\Gateway\Traits\StringFormatter;

class RegistrationResponse
{
    use StringFormatter;

    private $command;
    private $time;
    private $customerId;
    private $token;

    public static function fromXML(\SimpleXMLElement $xml)
    {
        $registrationResponse = new RegistrationResponse();
        $registrationResponse->populate($xml);

        return $registrationResponse;
    }

    public function populate(\SimpleXMLElement $xml)
    {
        $this->command = isset($xml->command) ? (string)$xml->command : null;
        $this->customerId = isset($xml->result->customerId) ? (string)$xml->result->customerId : null;
        $this->token = isset($xml->result->token) ? (string)$xml->result->token : null;
        $this->time = isset($xml->time) ? (new \DateTime())->setTimestamp(intval(substr((string)$xml->time, 0, -3))) : null;
    }

    /**
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }


    /**
     * @return mixed
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }
}
