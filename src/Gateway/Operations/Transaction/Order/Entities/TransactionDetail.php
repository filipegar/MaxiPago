<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class TransactionDetail implements OutputsVariables
{
    use ExposesVariables;

    private $payType;

    /**
     * @return PayType
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * @param PayType $payType
     * @return TransactionDetail
     */
    public function setPayType(PayType $payType)
    {
        $this->payType = $payType;
        return $this;
    }

    public function payType()
    {
        $payType = new PayType();
        $this->setPayType($payType);
        return $payType;
    }
}
