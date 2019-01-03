<?php

namespace Filipegar\Maxipago\Gateway\Operations\Report;

use Filipegar\Maxipago\Gateway\Interfaces\Requestable;
use Filipegar\Maxipago\Gateway\Traits\SerializesObjects;
use Filipegar\Maxipago\Merchant;

class GenericReport implements Requestable
{
    use SerializesObjects;

    private $merchant;
    private $xml;
    private $request;

    public function __construct(Merchant $merchant, ApiRequest $request)
    {
        $this->merchant = $merchant;
        $this->request = $request;
    }

    /**
     * @return \SimpleXMLElement
     */
    public function toRequest()
    {
        return $this->generateXml();
    }

    /**
     * @return \SimpleXMLElement
     */
    public function generateXml()
    {
        $this->xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rapi-request></rapi-request>');
        $this->xml->addChild('verification');
        $this->xml->verification->addChild('merchantId', $this->merchant->getMerchantId());
        $this->xml->verification->addChild('merchantKey', $this->merchant->getMerchantKey());
        $this->xml->addChild('command', $this->request->getAndUnsetCommand());
        $request = $this->xml->addChild('request');
        $this->objectToXml($request, $this->request->getVariables());
        return $this->xml;
    }
}
