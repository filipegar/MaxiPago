<?php

namespace Filipegar\Maxipago\Gateway\Operations\Registration;

use Filipegar\Maxipago\Gateway\Interfaces\NonTransaction;
use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Operations\Registration\Entities\ChangeRecurring;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;
use Filipegar\Maxipago\Gateway\Traits\HasCommand;

class CancelRecurringPayment extends ApiRequest implements NonTransaction, OutputsVariables
{
    use HasCommand, ExposesVariables;

    private $request;

    public function __construct()
    {
        $this->setCommand("cancel-recurring");
    }

    /**
     * @return CancelRecurringPayment
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param ChangeRecurring $request
     * @return CancelRecurringPayment
     */
    public function setRequest(ChangeRecurring $request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return ChangeRecurring
     */
    public function changeRecurring()
    {
        $changeRecurring = new ChangeRecurring();
        $this->setRequest($changeRecurring);
        return $changeRecurring;
    }
}
