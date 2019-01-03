<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\Authentication;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\Customer;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\FraudDetails;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\Payment;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\SaveOnFile;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\TransactionDetail;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

abstract class Order implements OutputsVariables
{
    use ExposesVariables;

    private $processorID;
    private $referenceNum;
    private $fraudCheck;
    private $ipAddress;
    private $customerIdExt;
    private $billing;
    private $shipping;
    private $transactionDetail;
    private $payment;
    private $authentication;
    private $saveOnFile;
    private $fraudDetails;

    /**
     * @return mixed
     */
    public function getProcessorID()
    {
        return $this->processorID;
    }

    /**
     * @param mixed $processorID
     * @return Order
     */
    public function setProcessorID($processorID)
    {
        $this->processorID = intval(substr($processorID, 0, 2));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReferenceNum()
    {
        return $this->referenceNum;
    }

    /**
     * @param mixed $referenceNum
     * @return Order
     */
    public function setReferenceNum($referenceNum)
    {
        $this->referenceNum = substr($referenceNum, 0, 128);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFraudCheck()
    {
        return $this->fraudCheck;
    }

    /**
     * @param boolean $fraudCheck
     * @return Order
     */
    public function setFraudCheck($fraudCheck)
    {
        if (boolval($fraudCheck) === true) {
            $this->fraudCheck = "Y";
        } else {
            $this->fraudCheck = "N";
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param mixed $ipAddress
     * @return Order
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = substr($ipAddress, 0, 16);
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
     * @return Order
     */
    public function setCustomerIdExt($customerIdExt)
    {
        $this->customerIdExt = substr(preg_replace('/[^\d]+/i', "", $customerIdExt), 0, 14);
        return $this;
    }

    /**
     * Get the billing customer
     *
     * @return Customer Billing customer
     */
    public function getBilling()
    {
        return $this->billing;
    }

    /**
     * @param Customer $billing
     *
     * @return Order
     */
    public function setBilling(Customer $billing)
    {
        $this->billing = $billing;
        return $this;
    }

    /**
     * Creates a billing customer
     *
     * @return Customer
     */
    public function billingCustomer()
    {
        $customer = new Customer();
        $this->setBilling($customer);

        return $customer;
    }

    /**
     * Get the shipping customer
     *
     * @return Customer Shipping customer
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param Customer $shipping
     *
     * @return Order
     */
    public function setShipping(Customer $shipping)
    {
        $this->shipping = $shipping;
        return $this;
    }

    /**
     * Creates a shipping customer
     *
     * @return Customer
     */
    public function shippingCustomer()
    {
        $customer = new Customer();
        $this->setShipping($customer);

        return $customer;
    }

    /**
     * @return TransactionDetail
     */
    public function getTransactionDetail()
    {
        return $this->transactionDetail;
    }

    /**
     * @param TransactionDetail $transactionDetail
     *
     * @return Order
     */
    public function setTransactionDetail(TransactionDetail $transactionDetail)
    {
        $this->transactionDetail = $transactionDetail;
        return $this;
    }

    public function transactionDetail()
    {
        $transactionDetail = new TransactionDetail();
        $this->setTransactionDetail($transactionDetail);

        return $transactionDetail;
    }

    /**
     * @return Payment
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param Payment $payment
     * @return Order
     */
    public function setPayment(Payment $payment)
    {
        $this->payment = $payment;
        return $this;
    }

    public function payment()
    {
        $payment = new Payment();
        $this->setPayment($payment);

        return $payment;
    }

    /**
     * @return Authentication
     */
    public function getAuthentication()
    {
        return $this->authentication;
    }

    /**
     * @param Authentication $authentication
     * @return Order
     */
    public function setAuthentication(Authentication $authentication)
    {
        $this->authentication = $authentication;
        return $this;
    }

    public function authentication()
    {
        $auth = new Authentication();
        $this->setAuthentication($auth);

        return $auth;
    }

    /**
     * @return SaveOnFile
     */
    public function getSaveOnFile()
    {
        return $this->saveOnFile;
    }

    /**
     * @param SaveOnFile $saveOnFile
     * @return Order
     */
    public function setSaveOnFile(SaveOnFile $saveOnFile)
    {
        $this->saveOnFile = $saveOnFile;
        return $this;
    }

    public function saveOnFile()
    {
        $saveOnFile = new SaveOnFile();
        $this->setSaveOnFile($saveOnFile);

        return $saveOnFile;
    }

    /**
     * @return FraudDetails
     */
    public function getFraudDetails()
    {
        return $this->fraudDetails;
    }

    /**
     * @param FraudDetails $fraudDetails
     * @return Order
     */
    public function setFraudDetails(FraudDetails $fraudDetails)
    {
        $this->fraudDetails = $fraudDetails;
        return $this;
    }

    /**
     * @return FraudDetails
     */
    public function fraudDetails()
    {
        $fraudDetails = new FraudDetails();
        $this->setFraudDetails($fraudDetails);
        return $fraudDetails;
    }
}
