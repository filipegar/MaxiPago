<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class FraudDetails implements OutputsVariables
{
    use ExposesVariables;

    private $fraudProcessorID;
    private $fraudToken;
    private $captureOnLowRisk;
    private $voidOnHighRisk;
    private $websiteId;

    /**
     * @return mixed
     */
    public function getFraudProcessorID()
    {
        return $this->fraudProcessorID;
    }

    /**
     * @param mixed $fraudProcessorID
     * @return FraudDetails
     */
    public function setFraudProcessorID($fraudProcessorID)
    {
        $this->fraudProcessorID = $fraudProcessorID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFraudToken()
    {
        return $this->fraudToken;
    }

    /**
     * @param mixed $fraudToken
     * @return FraudDetails
     */
    public function setFraudToken($fraudToken)
    {
        $this->fraudToken = $fraudToken;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCaptureOnLowRisk()
    {
        return $this->captureOnLowRisk;
    }

    /**
     * @param mixed $captureOnLowRisk
     * @return FraudDetails
     */
    public function setCaptureOnLowRisk($captureOnLowRisk)
    {
        $this->captureOnLowRisk = $captureOnLowRisk;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVoidOnHighRisk()
    {
        return $this->voidOnHighRisk;
    }

    /**
     * @param mixed $voidOnHighRisk
     * @return FraudDetails
     */
    public function setVoidOnHighRisk($voidOnHighRisk)
    {
        $this->voidOnHighRisk = $voidOnHighRisk;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebsiteId()
    {
        return $this->websiteId;
    }

    /**
     * @param mixed $websiteId
     * @return FraudDetails
     */
    public function setWebsiteId($websiteId)
    {
        $this->websiteId = $websiteId;
        return $this;
    }
}
