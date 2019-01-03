<?php

namespace Filipegar\Maxipago\Gateway\Requests;

use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\Exceptions\InvalidBodyException;
use Filipegar\Maxipago\Gateway\Interfaces\MaxipagoException;
use Filipegar\Maxipago\Gateway\Interfaces\Requestable;
use Filipegar\Maxipago\Gateway\Responses\RegistrationResponse;

class RegistrationRequest extends AbstractRequest
{
    /**
     * RegistrationRequest constructor.
     * @param Environment $environment
     */
    public function __construct(Environment $environment)
    {
        parent::__construct($environment);
    }

    /**
     * @param Requestable $registration
     * @return RegistrationResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws MaxipagoException
     */
    public function execute(Requestable $registration)
    {
        return $this->sendXMLRequest('POST', 'UniversalAPI/postAPI', $registration->toRequest());
    }

    /**
     * @param string $requestBody
     * @return RegistrationResponse
     * @throws InvalidBodyException
     */
    protected function unserialize($requestBody)
    {
        $xml = simplexml_load_string($requestBody);

        if (isset($xml->errorCode) && intval($xml->errorCode) !== 0) {
            throw new InvalidBodyException(
                (string)$xml->errorMessage,
                intval((string)$xml->errorCode)
            );
        }

        return RegistrationResponse::fromXML($xml);
    }
}
