<?php

namespace Filipegar\Maxipago\Gateway\Responses;

use Filipegar\Maxipago\Gateway\Traits\StringFormatter;

class TransactionResponse
{
    use StringFormatter;

    protected $otherFields = [];
    private $authCode;
    private $orderID;
    private $referenceNum;
    private $transactionID;
    private $transactionTimestamp;
    private $responseCode;
    private $responseMessage;
    private $avsResponseCode;
    private $cvvResponseCode;
    private $processorCode;
    private $processorMessage;
    private $processorName;
    private $creditCardBin;
    private $creditCardLast4;
    private $errorMessage;
    private $processorTransactionID;
    private $processorReferenceNumber;
    private $fraudScore;
    private $onlineDebitURL;
    private $boletoURL;
    private $authenticationURL;
    private $creditCardScheme;
    private $creditCardCountry;
    private $saveOnFile;
    private $emv;
    private $imagem_base64;

    public static function fromXML(\SimpleXMLElement $xml)
    {
        $transactionResponse = new TransactionResponse();
        $transactionResponse->populate($xml);

        return $transactionResponse;
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
    }

    /**
     * @return mixed
     */
    public function getAuthCode()
    {
        return $this->authCode;
    }

    /**
     * @param string $authCode
     * @return TransactionResponse
     */
    public function setAuthCode($authCode)
    {
        $this->authCode = (string)$authCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderID()
    {
        return $this->orderID;
    }

    /**
     * @param string $orderID
     * @return TransactionResponse
     */
    public function setOrderID($orderID)
    {
        $this->orderID = (string)$orderID;
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
     * @param string $referenceNum
     * @return TransactionResponse
     */
    public function setReferenceNum($referenceNum)
    {
        $this->referenceNum = (string)$referenceNum;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransactionID()
    {
        return $this->transactionID;
    }

    /**
     * @param string $transactionID
     * @return TransactionResponse
     */
    public function setTransactionID($transactionID)
    {
        $this->transactionID = (string)$transactionID;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTransactionTimestamp()
    {
        return $this->transactionTimestamp;
    }

    /**
     * @param string $transactionTimestamp
     * @return TransactionResponse
     * @throws \Exception
     */
    public function setTransactionTimestamp($transactionTimestamp)
    {
        if (empty($transactionTimestamp)) {
            $this->transactionTimestamp = "";
        } else {
            $this->transactionTimestamp = (new \DateTime())->setTimestamp(intval((string)$transactionTimestamp));
        }
        return $this;
    }

    /**
     * @return integer
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * @param string $responseCode
     * @return TransactionResponse
     */
    public function setResponseCode($responseCode)
    {
        $this->responseCode = intval((string)$responseCode);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponseMessage()
    {
        return $this->responseMessage;
    }

    /**
     * @param string $responseMessage
     * @return TransactionResponse
     */
    public function setResponseMessage($responseMessage)
    {
        $this->responseMessage = (string)$responseMessage;
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
     * @param string $avsResponseCode
     * @return TransactionResponse
     */
    public function setAvsResponseCode($avsResponseCode)
    {
        $this->avsResponseCode = (string)$avsResponseCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCvvResponseCode()
    {
        return $this->cvvResponseCode;
    }

    /**
     * @param string $cvvResponseCode
     * @return TransactionResponse
     */
    public function setCvvResponseCode($cvvResponseCode)
    {
        $this->cvvResponseCode = (string)$cvvResponseCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProcessorCode()
    {
        return $this->processorCode;
    }

    /**
     * @param string $processorCode
     * @return TransactionResponse
     */
    public function setProcessorCode($processorCode)
    {
        $this->processorCode = (string)$processorCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProcessorMessage()
    {
        return $this->processorMessage;
    }

    /**
     * @param string $processorMessage
     * @return TransactionResponse
     */
    public function setProcessorMessage($processorMessage)
    {
        $this->processorMessage = (string)$processorMessage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProcessorName()
    {
        return $this->processorName;
    }

    /**
     * @param string $processorName
     * @return TransactionResponse
     */
    public function setProcessorName($processorName)
    {
        $this->processorName = (string)$processorName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreditCardBin()
    {
        return $this->creditCardBin;
    }

    /**
     * @param string $creditCardBin
     * @return TransactionResponse
     */
    public function setCreditCardBin($creditCardBin)
    {
        $this->creditCardBin = (string)$creditCardBin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreditCardLast4()
    {
        return $this->creditCardLast4;
    }

    /**
     * @param string $creditCardLast4
     * @return TransactionResponse
     */
    public function setCreditCardLast4($creditCardLast4)
    {
        $this->creditCardLast4 = (string)$creditCardLast4;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     * @return TransactionResponse
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = (string)$errorMessage;
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
     * @param string $processorTransactionID
     * @return TransactionResponse
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
     * @param string $processorReferenceNumber
     * @return TransactionResponse
     */
    public function setProcessorReferenceNumber($processorReferenceNumber)
    {
        $this->processorReferenceNumber = (string)$processorReferenceNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFraudScore()
    {
        return $this->fraudScore;
    }

    /**
     * @param string $fraudScore
     * @return TransactionResponse
     */
    public function setFraudScore($fraudScore)
    {
        $this->fraudScore = (string)$fraudScore;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOnlineDebitURL()
    {
        return $this->onlineDebitURL;
    }

    /**
     * @param string $onlineDebitURL
     * @return TransactionResponse
     */
    public function setOnlineDebitURL($onlineDebitURL)
    {
        $this->onlineDebitURL = (string)$onlineDebitURL;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBoletoURL()
    {
        return $this->boletoURL;
    }

    /**
     * @param string $boletoURL
     * @return TransactionResponse
     */
    public function setBoletoURL($boletoURL)
    {
        $this->boletoURL = (string)$boletoURL;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthenticationURL()
    {
        return $this->authenticationURL;
    }

    /**
     * @param string $authenticationURL
     * @return TransactionResponse
     */
    public function setAuthenticationURL($authenticationURL)
    {
        $this->authenticationURL = (string)$authenticationURL;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreditCardScheme()
    {
        return $this->creditCardScheme;
    }

    /**
     * @param string $creditCardScheme
     * @return TransactionResponse
     */
    public function setCreditCardScheme($creditCardScheme)
    {
        $this->creditCardScheme = (string)$creditCardScheme;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreditCardCountry()
    {
        return $this->creditCardCountry;
    }

    /**
     * @param mixed $creditCardCountry
     * @return TransactionResponse
     */
    public function setCreditCardCountry($creditCardCountry)
    {
        $this->creditCardCountry = (string)$creditCardCountry;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSaveOnFile()
    {
        return $this->saveOnFile;
    }

    /**
     * @param \SimpleXMLElement $saveOnFile
     * @return TransactionResponse
     */
    public function setSaveOnFile(\SimpleXMLElement $saveOnFile)
    {
        $this->saveOnFile = (array)$saveOnFile;
        return $this;
    }

    public function getEmv()
    {
        return $this->emv;
    }

    public function setEmv($emv)
    {
        $this->emv = (string)$emv;
        return $this;
    }

    public function getImagem_base64()
    {
        return $this->imagem_base64;
    }

    public function setImagem_base64($imagem)
    {
        $this->imagem_base64 = (string)$imagem;
        return $this;
    }

    /**
     * @return array
     */
    public function getOtherFields()
    {
        return $this->otherFields;
    }
}
