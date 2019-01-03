<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\Recurring;

class RecurringPayment extends Order implements OutputsVariables
{
    private $recurring;

    /**
     * @return Recurring
     */
    public function getRecurring()
    {
        return $this->recurring;
    }

    /**
     * @param Recurring $recurring
     * @return RecurringPayment
     */
    public function setRecurring(Recurring $recurring)
    {
        $this->recurring = $recurring;
        return $this;
    }

    /**
     * @return Recurring
     */
    public function recurring()
    {
        $recurring = new Recurring();
        $this->setRecurring($recurring);

        return $recurring;
    }

    public function getVariables()
    {
        return array_merge(get_object_vars($this), parent::getVariables());
    }
}
