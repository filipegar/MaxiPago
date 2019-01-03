<?php

namespace Filipegar\Maxipago\Gateway\Operations\Report\Entities;

use Filipegar\Maxipago\Gateway\Traits\StringFormatter;

class ReportRecord
{
    use StringFormatter;

    protected $otherFields = [];
    private $transactionId;
    private $referenceNumber;
    private $transactionType;
    private $transactionAmount;
    private $shippingAmount;
    private $transactionDate;
    private $orderId;
    private $splitPaymentOrderId;
    private $userId;
    private $customerId;
    private $companyName;
    private $responseCode;
    private $approvalCode;
    private $paymentType;
    private $bankRoutingNumber;
    private $achAccountNumber;
    private $avsResponseCode;
    private $billingName;
    private $billingAddress1;
    private $billingAddress2;
    private $billingCity;
    private $billingState;
    private $billingCountry;
    private $billingZip;
    private $billingPhone;
    private $billingEmail;
    private $comments;
    private $transactionStatus;
    private $transactionState;
    private $recurringPaymentFlag;
    private $processorReturnedData;
    private $gatewayDebitNetworkID;
    private $creditCardType;
    private $boletoUrl;
    private $boletoNumber;
    private $expirationDate;
    private $processorID;
    private $dateOfPayment;
    private $dateOfFunding;
    private $bankOfPayment;
    private $branchOfPayment;
    private $paidAmount;
    private $bankFee;
    private $netAmount;
    private $returnCode;
    private $clearingCode;
    private $customField1;
    private $customField2;
    private $customField3;
    private $customField4;
    private $customField5;
    private $numberOfInstallments;
    private $chargeInterest;
    private $processorTransactionID;
    private $processorReferenceNumber;

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param mixed $transactionId
     * @return ReportRecord
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = (string)$transactionId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReferenceNumber()
    {
        return $this->referenceNumber;
    }

    /**
     * @param mixed $referenceNumber
     * @return ReportRecord
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->referenceNumber = (string)$referenceNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * @param mixed $transactionType
     * @return ReportRecord
     */
    public function setTransactionType($transactionType)
    {
        $this->transactionType = (string)$transactionType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransactionAmount()
    {
        return $this->transactionAmount;
    }

    /**
     * @param mixed $transactionAmount
     * @return ReportRecord
     */
    public function setTransactionAmount($transactionAmount)
    {
        $this->transactionAmount = (string)$transactionAmount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getShippingAmount()
    {
        return $this->shippingAmount;
    }

    /**
     * @param mixed $shippingAmount
     * @return ReportRecord
     */
    public function setShippingAmount($shippingAmount)
    {
        $this->shippingAmount = (string)$shippingAmount;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    /**
     * @param mixed $transactionDate
     * @return ReportRecord
     */
    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = \DateTime::createFromFormat("m/d/Y h:i:s A", (string)$transactionDate);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param mixed $orderId
     * @return ReportRecord
     */
    public function setOrderId($orderId)
    {
        $this->orderId = (string)$orderId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSplitPaymentOrderId()
    {
        return $this->splitPaymentOrderId;
    }

    /**
     * @param mixed $splitPaymentOrderId
     * @return ReportRecord
     */
    public function setSplitPaymentOrderId($splitPaymentOrderId)
    {
        $this->splitPaymentOrderId = (string)$splitPaymentOrderId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     * @return ReportRecord
     */
    public function setUserId($userId)
    {
        $this->userId = (string)$userId;
        return $this;
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
     * @return ReportRecord
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = (string)$customerId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $companyName
     * @return ReportRecord
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = (string)$companyName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * @param mixed $responseCode
     * @return ReportRecord
     */
    public function setResponseCode($responseCode)
    {
        $this->responseCode = (string)$responseCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getApprovalCode()
    {
        return $this->approvalCode;
    }

    /**
     * @param mixed $approvalCode
     * @return ReportRecord
     */
    public function setApprovalCode($approvalCode)
    {
        $this->approvalCode = (string)$approvalCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @param mixed $paymentType
     * @return ReportRecord
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = (string)$paymentType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBankRoutingNumber()
    {
        return $this->bankRoutingNumber;
    }

    /**
     * @param mixed $bankRoutingNumber
     * @return ReportRecord
     */
    public function setBankRoutingNumber($bankRoutingNumber)
    {
        $this->bankRoutingNumber = (string)$bankRoutingNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAchAccountNumber()
    {
        return $this->achAccountNumber;
    }

    /**
     * @param mixed $achAccountNumber
     * @return ReportRecord
     */
    public function setAchAccountNumber($achAccountNumber)
    {
        $this->achAccountNumber = (string)$achAccountNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvsResponseCode()
    {
        return $this->avsResponseCode;
    }

    /**
     * @param mixed $avsResponseCode
     * @return ReportRecord
     */
    public function setAvsResponseCode($avsResponseCode)
    {
        $this->avsResponseCode = (string)$avsResponseCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingName()
    {
        return $this->billingName;
    }

    /**
     * @param mixed $billingName
     * @return ReportRecord
     */
    public function setBillingName($billingName)
    {
        $this->billingName = (string)$billingName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingAddress1()
    {
        return $this->billingAddress1;
    }

    /**
     * @param mixed $billingAddress1
     * @return ReportRecord
     */
    public function setBillingAddress1($billingAddress1)
    {
        $this->billingAddress1 = (string)$billingAddress1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingAddress2()
    {
        return $this->billingAddress2;
    }

    /**
     * @param mixed $billingAddress2
     * @return ReportRecord
     */
    public function setBillingAddress2($billingAddress2)
    {
        $this->billingAddress2 = (string)$billingAddress2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingCity()
    {
        return $this->billingCity;
    }

    /**
     * @param mixed $billingCity
     * @return ReportRecord
     */
    public function setBillingCity($billingCity)
    {
        $this->billingCity = (string)$billingCity;
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
     * @return ReportRecord
     */
    public function setBillingState($billingState)
    {
        $this->billingState = (string)$billingState;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingCountry()
    {
        return $this->billingCountry;
    }

    /**
     * @param mixed $billingCountry
     * @return ReportRecord
     */
    public function setBillingCountry($billingCountry)
    {
        $this->billingCountry = (string)$billingCountry;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingZip()
    {
        return $this->billingZip;
    }

    /**
     * @param mixed $billingZip
     * @return ReportRecord
     */
    public function setBillingZip($billingZip)
    {
        $this->billingZip = (string)$billingZip;
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
     * @return ReportRecord
     */
    public function setBillingPhone($billingPhone)
    {
        $this->billingPhone = (string)$billingPhone;
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
     * @return ReportRecord
     */
    public function setBillingEmail($billingEmail)
    {
        $this->billingEmail = (string)$billingEmail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     * @return ReportRecord
     */
    public function setComments($comments)
    {
        $this->comments = (string)$comments;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransactionStatus()
    {
        return $this->transactionStatus;
    }

    /**
     * @param mixed $transactionStatus
     * @return ReportRecord
     */
    public function setTransactionStatus($transactionStatus)
    {
        $this->transactionStatus = (string)$transactionStatus;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransactionState()
    {
        return $this->transactionState;
    }

    /**
     * @param mixed $transactionState
     * @return ReportRecord
     */
    public function setTransactionState($transactionState)
    {
        $this->transactionState = (string)$transactionState;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecurringPaymentFlag()
    {
        return $this->recurringPaymentFlag;
    }

    /**
     * @param mixed $recurringPaymentFlag
     * @return ReportRecord
     */
    public function setRecurringPaymentFlag($recurringPaymentFlag)
    {
        $this->recurringPaymentFlag = (string)$recurringPaymentFlag;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProcessorReturnedData()
    {
        return $this->processorReturnedData;
    }

    /**
     * @param mixed $processorReturnedData
     * @return ReportRecord
     */
    public function setProcessorReturnedData($processorReturnedData)
    {
        $this->processorReturnedData = (string)$processorReturnedData;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGatewayDebitNetworkID()
    {
        return $this->gatewayDebitNetworkID;
    }

    /**
     * @param mixed $gatewayDebitNetworkID
     * @return ReportRecord
     */
    public function setGatewayDebitNetworkID($gatewayDebitNetworkID)
    {
        $this->gatewayDebitNetworkID = (string)$gatewayDebitNetworkID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreditCardType()
    {
        return $this->creditCardType;
    }

    /**
     * @param mixed $creditCardType
     * @return ReportRecord
     */
    public function setCreditCardType($creditCardType)
    {
        $this->creditCardType = (string)$creditCardType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBoletoUrl()
    {
        return $this->boletoUrl;
    }

    /**
     * @param mixed $boletoUrl
     * @return ReportRecord
     */
    public function setBoletoUrl($boletoUrl)
    {
        $this->boletoUrl = (string)$boletoUrl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBoletoNumber()
    {
        return $this->boletoNumber;
    }

    /**
     * @param mixed $boletoNumber
     * @return ReportRecord
     */
    public function setBoletoNumber($boletoNumber)
    {
        $this->boletoNumber = (string)$boletoNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param mixed $expirationDate
     * @return ReportRecord
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = (string)$expirationDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProcessorID()
    {
        return $this->processorID;
    }

    /**
     * @param mixed $processorID
     * @return ReportRecord
     */
    public function setProcessorID($processorID)
    {
        $this->processorID = (string)$processorID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateOfPayment()
    {
        return $this->dateOfPayment;
    }

    /**
     * @param mixed $dateOfPayment
     * @return ReportRecord
     */
    public function setDateOfPayment($dateOfPayment)
    {
        $this->dateOfPayment = (string)$dateOfPayment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateOfFunding()
    {
        return $this->dateOfFunding;
    }

    /**
     * @param mixed $dateOfFunding
     * @return ReportRecord
     */
    public function setDateOfFunding($dateOfFunding)
    {
        $this->dateOfFunding = (string)$dateOfFunding;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBankOfPayment()
    {
        return $this->bankOfPayment;
    }

    /**
     * @param mixed $bankOfPayment
     * @return ReportRecord
     */
    public function setBankOfPayment($bankOfPayment)
    {
        $this->bankOfPayment = (string)$bankOfPayment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBranchOfPayment()
    {
        return $this->branchOfPayment;
    }

    /**
     * @param mixed $branchOfPayment
     * @return ReportRecord
     */
    public function setBranchOfPayment($branchOfPayment)
    {
        $this->branchOfPayment = (string)$branchOfPayment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaidAmount()
    {
        return $this->paidAmount;
    }

    /**
     * @param mixed $paidAmount
     * @return ReportRecord
     */
    public function setPaidAmount($paidAmount)
    {
        $this->paidAmount = (string)$paidAmount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBankFee()
    {
        return $this->bankFee;
    }

    /**
     * @param mixed $bankFee
     * @return ReportRecord
     */
    public function setBankFee($bankFee)
    {
        $this->bankFee = (string)$bankFee;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNetAmount()
    {
        return $this->netAmount;
    }

    /**
     * @param mixed $netAmount
     * @return ReportRecord
     */
    public function setNetAmount($netAmount)
    {
        $this->netAmount = (string)$netAmount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReturnCode()
    {
        return $this->returnCode;
    }

    /**
     * @param mixed $returnCode
     * @return ReportRecord
     */
    public function setReturnCode($returnCode)
    {
        $this->returnCode = (string)$returnCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClearingCode()
    {
        return $this->clearingCode;
    }

    /**
     * @param mixed $clearingCode
     * @return ReportRecord
     */
    public function setClearingCode($clearingCode)
    {
        $this->clearingCode = (string)$clearingCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomField1()
    {
        return $this->customField1;
    }

    /**
     * @param mixed $customField1
     * @return ReportRecord
     */
    public function setCustomField1($customField1)
    {
        $this->customField1 = (string)$customField1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomField2()
    {
        return $this->customField2;
    }

    /**
     * @param mixed $customField2
     * @return ReportRecord
     */
    public function setCustomField2($customField2)
    {
        $this->customField2 = (string)$customField2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomField3()
    {
        return $this->customField3;
    }

    /**
     * @param mixed $customField3
     * @return ReportRecord
     */
    public function setCustomField3($customField3)
    {
        $this->customField3 = (string)$customField3;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomField4()
    {
        return $this->customField4;
    }

    /**
     * @param mixed $customField4
     * @return ReportRecord
     */
    public function setCustomField4($customField4)
    {
        $this->customField4 = (string)$customField4;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomField5()
    {
        return $this->customField5;
    }

    /**
     * @param mixed $customField5
     * @return ReportRecord
     */
    public function setCustomField5($customField5)
    {
        $this->customField5 = (string)$customField5;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumberOfInstallments()
    {
        return $this->numberOfInstallments;
    }

    /**
     * @param mixed $numberOfInstallments
     * @return ReportRecord
     */
    public function setNumberOfInstallments($numberOfInstallments)
    {
        $this->numberOfInstallments = (string)$numberOfInstallments;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChargeInterest()
    {
        return $this->chargeInterest;
    }

    /**
     * @param mixed $chargeInterest
     * @return ReportRecord
     */
    public function setChargeInterest($chargeInterest)
    {
        $this->chargeInterest = (string)$chargeInterest;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProcessorTransactionID()
    {
        return $this->processorTransactionID;
    }

    /**
     * @param mixed $processorTransactionID
     * @return ReportRecord
     */
    public function setProcessorTransactionID($processorTransactionID)
    {
        $this->processorTransactionID = (string)$processorTransactionID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProcessorReferenceNumber()
    {
        return $this->processorReferenceNumber;
    }

    /**
     * @param mixed $processorReferenceNumber
     * @return ReportRecord
     */
    public function setProcessorReferenceNumber($processorReferenceNumber)
    {
        $this->processorReferenceNumber = (string)$processorReferenceNumber;
        return $this;
    }

    public function populate(\SimpleXMLElement $xml)
    {
        foreach ($xml as $key => $item) {
            $methodName = $this->formatResponseFieldSetter($key);
            if (method_exists($this, $methodName)) {
                $this->{$methodName}($item);
            } else {
                $this->otherFields[$key] = (string)$item;
            }
        }

        return $this;
    }
}
