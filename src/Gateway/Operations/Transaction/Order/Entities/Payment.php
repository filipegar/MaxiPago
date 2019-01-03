<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class Payment implements OutputsVariables
{
    use ExposesVariables;

    private $chargeTotal;
    private $currencyCode;
    private $creditInstallment;
    private $softDescriptor;

    /**
     * @return mixed
     */
    public function getSoftDescriptor()
    {
        return $this->softDescriptor;
    }

    /**
     * @param mixed $softDescriptor
     * @return Payment
     */
    public function setSoftDescriptor($softDescriptor)
    {
        $this->softDescriptor = substr(preg_replace("/[^a-zA-Z0-9]+/i", "", $softDescriptor), 0, 13);
        return $this;
    }

    /**
     * @return float
     */
    public function getChargeTotal()
    {
        return $this->chargeTotal;
    }

    /**
     * @param float $chargeTotal
     * @return Payment
     */
    public function setChargeTotal($chargeTotal)
    {
        $this->chargeTotal = floatval($chargeTotal);
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param string $currencyCode
     * @return Payment
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = substr($currencyCode, 0, 3);
        return $this;
    }

    /**
     * @return CreditInstallment
     */
    public function getCreditInstallment()
    {
        return $this->creditInstallment;
    }

    /**
     * @param CreditInstallment $creditInstallments
     * @return Payment
     */
    public function setCreditInstallment(CreditInstallment $creditInstallments)
    {
        $this->creditInstallment = $creditInstallments;
        return $this;
    }

    public function creditInstallments($numberOfInstallments, $hasInterest = false)
    {
        $creditInstallments = new CreditInstallment($numberOfInstallments, $hasInterest);
        $this->setCreditInstallment($creditInstallments);
        return $creditInstallments;
    }
}
