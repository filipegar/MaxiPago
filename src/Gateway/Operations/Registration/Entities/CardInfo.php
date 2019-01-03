<?php

namespace Filipegar\Maxipago\Gateway\Operations\Registration\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class CardInfo implements OutputsVariables
{
    use ExposesVariables;

    private $creditCardNumber;
    private $expirationMonth;
    private $expirationYear;
    private $softDescriptor;

    /**
     * @return string
     */
    public function getCreditCardNumber()
    {
        return $this->creditCardNumber;
    }

    /**
     * @param mixed $creditCardNumber
     * @return CardInfo
     */
    public function setCreditCardNumber($creditCardNumber)
    {
        $this->creditCardNumber = substr($creditCardNumber, 0, 19);
        return $this;
    }

    /**
     * @return string
     */
    public function getExpirationMonth()
    {
        return $this->expirationMonth;
    }

    /**
     * @param mixed $expirationMonth
     * @return CardInfo
     */
    public function setExpirationMonth($expirationMonth)
    {
        $this->expirationMonth = substr(sprintf("%02d", $expirationMonth), 0, 2);
        return $this;
    }

    /**
     * @return string
     */
    public function getExpirationYear()
    {
        return $this->expirationYear;
    }

    /**
     * @param mixed $expirationYear
     * @return CardInfo
     */
    public function setExpirationYear($expirationYear)
    {
        $this->expirationYear = substr(sprintf("%04d", $expirationYear), 0, 4);
        return $this;
    }

    /**
     * @return string
     */
    public function getSoftDescriptor()
    {
        return $this->softDescriptor;
    }

    /**
     * @param mixed $softDescriptor
     * @return CardInfo
     */
    public function setSoftDescriptor($softDescriptor)
    {
        $this->softDescriptor = substr($softDescriptor, 0, 13);
        return $this;
    }
}
