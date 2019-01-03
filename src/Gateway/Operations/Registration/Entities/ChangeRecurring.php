<?php

namespace Filipegar\Maxipago\Gateway\Operations\Registration\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\Recurring;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class ChangeRecurring implements OutputsVariables
{
    use ExposesVariables;

    private $orderID;
    private $paymentInfo;
    private $recurring;
    private $billingInfo;
    private $shippingInfo;

    /**
     * @return mixed
     */
    public function getOrderID()
    {
        return $this->orderID;
    }

    /**
     * @param mixed $orderID
     * @return ChangeRecurring
     */
    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;
        return $this;
    }

    /**
     * @return PaymentInfo
     */
    public function getPaymentInfo()
    {
        return $this->paymentInfo;
    }

    /**
     * @param PaymentInfo $paymentInfo
     * @return ChangeRecurring
     */
    public function setPaymentInfo(PaymentInfo $paymentInfo)
    {
        $this->paymentInfo = $paymentInfo;
        return $this;
    }

    /**
     * @return PaymentInfo
     */
    public function paymentInfo()
    {
        $paymentInfo = new PaymentInfo();
        $this->setPaymentInfo($paymentInfo);
        return $paymentInfo;
    }

    /**
     * @return Recurring
     */
    public function getRecurring()
    {
        return $this->recurring;
    }

    /**
     * @param Recurring $recurring
     * @return ChangeRecurring
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

    /**
     * @return Consumer
     */
    public function getBillingInfo()
    {
        return $this->billingInfo;
    }

    /**
     * @param Consumer $billingInfo
     * @return ChangeRecurring
     */
    public function setBillingInfo(Consumer $billingInfo)
    {
        $this->billingInfo = $billingInfo;
        return $this;
    }

    /**
     * @return Consumer
     */
    public function billingInfo()
    {
        $billingInfo = new Consumer();
        $this->setBillingInfo($billingInfo);
        return $billingInfo;
    }

    /**
     * @return Consumer
     */
    public function getShippingInfo()
    {
        return $this->shippingInfo;
    }

    /**
     * @param Consumer $shippingInfo
     * @return ChangeRecurring
     */
    public function setShippingInfo(Consumer $shippingInfo)
    {
        $this->shippingInfo = $shippingInfo;
        return $this;
    }

    /**
     * @return Consumer
     */
    public function shippingInfo()
    {
        $shippingInfo = new Consumer();
        $this->setShippingInfo($shippingInfo);
        return $shippingInfo;
    }
}
