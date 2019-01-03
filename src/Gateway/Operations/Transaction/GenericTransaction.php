<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction;

use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\Interfaces\Requestable;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Order;
use Filipegar\Maxipago\Gateway\Traits\SerializesObjects;
use Filipegar\Maxipago\Gateway\Traits\StringFormatter;
use Filipegar\Maxipago\Merchant;

class GenericTransaction implements Requestable
{
    use StringFormatter, SerializesObjects;

    private $merchant;
    private $environment;
    private $xml;
    private $order;

    public function __construct(Environment $environment, Merchant $merchant, Order $order)
    {
        $this->merchant = $merchant;
        $this->environment = $environment;
        $this->order = $order;
    }

    /**
     * @return mixed|\SimpleXMLElement
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
        $this->xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><transaction-request></transaction-request>');
        $this->xml->addChild('version', $this->environment->getApiVersion());
        $this->xml->addChild('verification');
        $this->xml->verification->addChild('merchantId', $this->merchant->getMerchantId());
        $this->xml->verification->addChild('merchantKey', $this->merchant->getMerchantKey());
        $order = $this->xml->addChild('order')->addChild($this->formatClassName($this->order));
        $this->objectToXml($order, $this->order->getVariables());

        return $this->xml;
    }
}
