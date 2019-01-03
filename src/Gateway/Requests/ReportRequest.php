<?php

namespace Filipegar\Maxipago\Gateway\Requests;

use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\Exceptions\InvalidBodyException;
use Filipegar\Maxipago\Gateway\Interfaces\MaxipagoException;
use Filipegar\Maxipago\Gateway\Interfaces\Requestable;
use Filipegar\Maxipago\Gateway\Responses\ReportResponse;

class ReportRequest extends AbstractRequest
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
     * @param Requestable $report
     * @return ReportResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws MaxipagoException
     */
    public function execute(Requestable $report)
    {
        return $this->sendXMLRequest('POST', 'ReportsAPI/servlet/ReportsAPI', $report->toRequest());
    }

    /**
     * @param string $requestBody
     * @return ReportResponse
     * @throws InvalidBodyException
     */
    protected function unserialize($requestBody)
    {
        $xml = simplexml_load_string($requestBody);

        if (isset($xml->header->errorCode) && intval($xml->header->errorCode) !== 0) {
            throw new InvalidBodyException(
                (string)$xml->header->errorMsg,
                intval((string)$xml->header->errorCode)
            );
        }

        return ReportResponse::fromXML($xml);
    }
}
