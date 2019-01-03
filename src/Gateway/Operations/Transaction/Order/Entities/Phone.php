<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class Phone implements OutputsVariables
{
    use ExposesVariables;

    const TYPE_RESIDENTIAL = "Residential";
    const TYPE_COMMERCIAL = "Commercial";
    const TYPE_MOBILE = "Mobile";
    const TYPE_FAX = "Fax";
    const TYPE_UNDEFINED = "Undefined";
    const TYPE_MESSAGE = "Message";
    const TYPE_BILLING = "Billing";

    private $phoneType;
    private $phoneCountryCode;
    private $phoneAreaCode;
    private $phoneNumber;
    private $phoneExtension;

    /**
     * @return mixed
     */
    public function getPhoneType()
    {
        return $this->phoneType;
    }

    /**
     * @param mixed $phoneType
     * @return Phone
     */
    public function setPhoneType($phoneType)
    {
        $this->phoneType = $phoneType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoneCountryCode()
    {
        return $this->phoneCountryCode;
    }

    /**
     * @param mixed $phoneCountryCode
     * @return Phone
     */
    public function setPhoneCountryCode($phoneCountryCode)
    {
        $this->phoneCountryCode = $phoneCountryCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoneAreaCode()
    {
        return $this->phoneAreaCode;
    }

    /**
     * @param mixed $phoneAreaCode
     * @return Phone
     */
    public function setPhoneAreaCode($phoneAreaCode)
    {
        $this->phoneAreaCode = $phoneAreaCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     * @return Phone
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoneExtension()
    {
        return $this->phoneExtension;
    }

    /**
     * @param mixed $phoneExtension
     * @return Phone
     */
    public function setPhoneExtension($phoneExtension)
    {
        $this->phoneExtension = $phoneExtension;
        return $this;
    }
}
