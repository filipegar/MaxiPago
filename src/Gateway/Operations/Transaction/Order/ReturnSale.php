<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;

class ReturnSale extends Order implements OutputsVariables
{
    private $orderID;

    /**
     * @return mixed
     */
    public function getOrderID()
    {
        return $this->orderID;
    }

    /**
     * @param mixed $orderID
     * @return ReturnSale
     */
    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;
        return $this;
    }

    public function getVariables()
    {
        return array_merge(get_object_vars($this), parent::getVariables());
    }
}
