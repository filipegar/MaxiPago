<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\PaymentTypes;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class OnFile implements OutputsVariables
{
    use ExposesVariables;

    private $customerId;
    private $customerIdExt;
    private $token;
    private $cvvNumber;

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $customerId
     * @return OnFile
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerIdExt()
    {
        return $this->customerIdExt;
    }

    /**
     * @param mixed $customerIdExt
     * @return OnFile
     */
    public function setCustomerIdExt($customerIdExt)
    {
        $this->customerIdExt = $customerIdExt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     * @return OnFile
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getCvvNumber()
    {
        return $this->cvvNumber;
    }

    /**
     * @param mixed $cvvNumber
     * @return OnFile
     */
    public function setCvvNumber($cvvNumber)
    {
        $this->cvvNumber = substr($cvvNumber, 0, 4);
        return $this;
    }
}
