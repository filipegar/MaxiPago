<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;

class VoidCapture extends Order implements OutputsVariables
{
    private $transactionID;

    /**
     * @return mixed
     */
    public function getTransactionID()
    {
        return $this->transactionID;
    }

    /**
     * @param mixed $transactionID
     * @return VoidCapture
     */
    public function setTransactionID($transactionID)
    {
        $this->transactionID = $transactionID;
        return $this;
    }

    public function getVariables()
    {
        return array_merge(get_object_vars($this), parent::getVariables());
    }
}
