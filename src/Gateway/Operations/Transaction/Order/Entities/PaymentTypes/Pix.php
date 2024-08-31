<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\PaymentTypes;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class Pix implements OutputsVariables
{
    use ExposesVariables;

    private $expirationTime;
    private $paymentInfo;
    
    public function getExpirationTime()
    {
        return $this->expirationTime;
    }

    public function setExpirationTime($expirationTime)
    {
        $this->expirationTime = $expirationTime;
        return $this;
    } 
    
    public function getPaymentInfo()
    {
        return $this->expirationTime;
    }

    public function setPaymentInfo($paymentInfo)
    {
        $this->paymentInfo = $paymentInfo;
        return $this;
    } 
}
