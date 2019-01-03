<?php

namespace Filipegar\Maxipago\Gateway\Requests;

use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\Exceptions\InvalidBodyException;
use Filipegar\Maxipago\Gateway\Interfaces\MaxipagoException;
use Filipegar\Maxipago\Gateway\Interfaces\Requestable;
use Filipegar\Maxipago\Gateway\Responses\TransactionResponse;

class TransactionRequest extends AbstractRequest
{
    /**
     * TransactionRequest constructor.
     * @param Environment $environment
     */
    public function __construct(Environment $environment)
    {
        parent::__construct($environment);
    }

    /**
     * @param Requestable $transaction
     * @return TransactionResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws MaxipagoException
     */
    public function execute(Requestable $transaction)
    {
        return $this->sendXMLRequest('POST', 'UniversalAPI/postXML', $transaction->toRequest());
    }

    /**
     * @param string $requestBody
     * @return TransactionResponse
     * @throws InvalidBodyException
     */
    protected function unserialize($requestBody)
    {
        $xml = simplexml_load_string($requestBody);

        if ((string)$xml->getName() === "api-error") {
            throw new InvalidBodyException(
                (string)$xml->children()->errorMsg,
                intval((string)$xml->children()->errorCode)
            );
        }

        return TransactionResponse::fromXML($xml);
    }
}
