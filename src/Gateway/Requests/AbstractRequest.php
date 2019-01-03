<?php

namespace Filipegar\Maxipago\Gateway\Requests;

use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\Interfaces\Requestable;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;

abstract class AbstractRequest
{
    private $environment;

    /**
     * AbstractSaleRequest constructor.
     *
     * @param Environment $environment
     */
    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     * @param Requestable $param
     *
     * @return mixed
     */
    abstract public function execute(Requestable $param);


    /**
     * Sends the transaction to MaxiPago Universal API as XML
     *
     * @param $method
     * @param $operation
     * @param \SimpleXMLElement $xml
     * @return mixed
     * @throws GuzzleException
     */
    protected function sendXMLRequest($method, $operation, \SimpleXMLElement $xml)
    {
        $headers = [
            'User-Agent' => 'Filipegar-MaxiPago/1.0 PHP SDK',
            'Accept' => 'text/xml,application/xml',
            'Content-Type' => 'text/xml',
            'Charset' => 'UTF-8',
            'RequestId' => uniqid(),
        ];

        $client = new Client([
            'base_uri' => $this->environment->getApiUrl(),
            'headers' => $headers,
            'verify' => true,
            'defaults' => [
                'config' => [
                    'curl' => [
                        CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2
                    ]
                ]
            ]
        ]);

        $options = [
            'body' => $xml->asXML(),
        ];

        $response = $client->request($method, $operation, $options);

        return $this->readResponse($response);
    }


    /**
     * @param Response $response
     *
     * @return mixed
     */
    protected function readResponse(Response $response)
    {
        return $this->unserialize($response->getBody());
    }

    /**
     * @param string $requestBody
     *
     * @return mixed
     */
    abstract protected function unserialize($requestBody);
}
