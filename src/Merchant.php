<?php

namespace Filipegar\Maxipago;

use InvalidArgumentException;

class Merchant
{
    private $merchantId;
    private $merchantKey;

    /**
     * Merchant constructor.
     *
     * @param $merchantId
     * @param $merchantKey
     */
    public function __construct($merchantId, $merchantKey)
    {
        if (strlen($merchantKey) !== 24) {
            throw new InvalidArgumentException("Merchant Key should have 24 characters.");
        }

        $this->merchantId = (int)$merchantId;
        $this->merchantKey = $merchantKey;
    }

    /**
     * Gets the merchant identification number
     *
     * @return string the merchant identification number on Maxipago
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * Gets the merchant identification token
     *
     * @return string the merchant identification key on Maxipago
     */
    public function getMerchantKey()
    {
        return $this->merchantKey;
    }
}
