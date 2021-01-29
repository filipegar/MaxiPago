<?php

namespace Filipegar\Maxipago\Gateway\Operations\Registration\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class CardOnFile implements OutputsVariables
{
    use ExposesVariables;

    const PERMISSION_ONGOING = "ongoing";
    const PERMISSION_USEONCE = "use_once";

    private $customerId;
    private $creditCardNumber;
    private $expirationMonth;
    private $expirationYear;
    private $billingName;
    private $billingAddress1;
    private $billingAddress2;
    private $billingCity;
    private $billingState;
    private $billingZip;
    private $billingCountry;
    private $billingPhone;
    private $billingEmail;
    private $onFilePermissions;
    private $onFileMaxChargeAmount;
    private $token;

    public function __construct($customerId)
    {
        $this->setCustomerId($customerId);
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $customerId
     * @return CardOnFile
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreditCardNumber()
    {
        return $this->creditCardNumber;
    }

    /**
     * @param mixed $creditCardNumber
     * @return CardOnFile
     */
    public function setCreditCardNumber($creditCardNumber)
    {
        $this->creditCardNumber = substr($creditCardNumber, 0, 19);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpirationMonth()
    {
        return $this->expirationMonth;
    }

    /**
     * @param mixed $expirationMonth
     * @return CardOnFile
     */
    public function setExpirationMonth($expirationMonth)
    {
        if (strlen($expirationMonth) !== 2) {
            throw new \InvalidArgumentException("Expiration Month should have 4 chars.");
        }

        $this->expirationMonth = $expirationMonth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpirationYear()
    {
        return $this->expirationYear;
    }


    /**
     * @param $expirationYear
     * @return $this
     */
    public function setExpirationYear($expirationYear)
    {
        if (strlen($expirationYear) !== 4) {
            throw new \InvalidArgumentException("Expiration Year should have 4 chars.");
        }

        $this->expirationYear = $expirationYear;
        return $this;
    }

    /**
     * @return string
     */
    public function getBillingName()
    {
        return $this->billingName;
    }

    /**
     * @param mixed $billingName
     * @return CardOnFile
     */
    public function setBillingName($billingName)
    {
        $this->billingName = substr($billingName, 0, 26);
        return $this;
    }

    /**
     * @return string
     */
    public function getBillingAddress1()
    {
        return $this->billingAddress1;
    }

    /**
     * @param mixed $billingAddress1
     * @return CardOnFile
     */
    public function setBillingAddress1($billingAddress1)
    {
        $this->billingAddress1 = substr($billingAddress1, 0, 128);
        return $this;
    }

    /**
     * @return string
     */
    public function getBillingAddress2()
    {
        return $this->billingAddress2;
    }

    /**
     * @param mixed $billingAddress2
     * @return CardOnFile
     */
    public function setBillingAddress2($billingAddress2)
    {
        $this->billingAddress2 = substr($billingAddress2, 0, 128);
        return $this;
    }

    /**
     * @return string
     */
    public function getBillingCity()
    {
        return $this->billingCity;
    }

    /**
     * @param mixed $billingCity
     * @return CardOnFile
     */
    public function setBillingCity($billingCity)
    {
        $this->billingCity = substr($billingCity, 0, 64);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingState()
    {
        return $this->billingState;
    }

    /**
     * @param mixed $billingState
     * @return CardOnFile
     */
    public function setBillingState($billingState)
    {
        $this->billingState = substr($billingState, 0, 2);
        return $this;
    }

    /**
     * @return string
     */
    public function getBillingZip()
    {
        return $this->billingZip;
    }

    /**
     * @param mixed $billingZip
     * @return CardOnFile
     */
    public function setBillingZip($billingZip)
    {
        $this->billingZip = substr($billingZip, 0, 9);
        return $this;
    }

    /**
     * @return string
     */
    public function getBillingCountry()
    {
        return $this->billingCountry;
    }

    /**
     * @param mixed $billingCountry
     * @return CardOnFile
     */
    public function setBillingCountry($billingCountry)
    {
        $this->billingCountry = substr($billingCountry, 0, 2);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingPhone()
    {
        return $this->billingPhone;
    }

    /**
     * @param mixed $billingPhone
     * @return CardOnFile
     */
    public function setBillingPhone($billingPhone)
    {
        $this->billingPhone = $billingPhone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingEmail()
    {
        return $this->billingEmail;
    }

    /**
     * @param mixed $billingEmail
     * @return CardOnFile
     */
    public function setBillingEmail($billingEmail)
    {
        $this->billingEmail = $billingEmail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOnFilePermissions()
    {
        return $this->onFilePermissions;
    }

    /**
     * @param mixed $onFilePermissions
     * @return CardOnFile
     */
    public function setOnFilePermissions($onFilePermissions)
    {
        $this->onFilePermissions = $onFilePermissions;
        return $this;
    }

    /**
     * @return float
     */
    public function getOnFileMaxChargeAmount()
    {
        return $this->onFileMaxChargeAmount;
    }

    /**
     * @param mixed $onFileMaxChargeAmount
     * @return CardOnFile
     */
    public function setOnFileMaxChargeAmount($onFileMaxChargeAmount)
    {
        $this->onFileMaxChargeAmount = floatval($onFileMaxChargeAmount);
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
     * @return CardOnFile
     */
    public function setToken($token)
    {
        if (strlen($token) <= 24) {
            throw new \InvalidArgumentException("Token should have until 24 chars.");
        }

        $this->token = $token;
        return $this;
    }
}
