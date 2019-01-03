<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class SaveOnFile implements OutputsVariables
{
    use ExposesVariables;

    const PERMISSION_ONGOING = "ongoing";
    const PERMISSION_USEONCE = "use_once";

    private $customerToken;
    private $onFileEndDate;
    private $onFilePermissions;
    private $onFileComment;
    private $onFileMaxChargeAmount;

    /**
     * @return mixed
     */
    public function getCustomerToken()
    {
        return $this->customerToken;
    }

    /**
     * @param mixed $customerToken
     * @return SaveOnFile
     */
    public function setCustomerToken($customerToken)
    {
        $this->customerToken = $customerToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getOnFileEndDate()
    {
        return $this->onFileEndDate;
    }

    /**
     * @param \DateTime $onFileEndDate
     * @return SaveOnFile
     */
    public function setOnFileEndDate(\DateTime $onFileEndDate)
    {
        $this->onFileEndDate = $onFileEndDate->format('m/d/Y');
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
     * @return SaveOnFile
     */
    public function setOnFilePermissions($onFilePermissions)
    {
        $this->onFilePermissions = $onFilePermissions;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOnFileComment()
    {
        return $this->onFileComment;
    }

    /**
     * @param mixed $onFileComment
     * @return SaveOnFile
     */
    public function setOnFileComment($onFileComment)
    {
        $this->onFileComment = $onFileComment;
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
     * @return SaveOnFile
     */
    public function setOnFileMaxChargeAmount($onFileMaxChargeAmount)
    {
        $this->onFileMaxChargeAmount = floatval($onFileMaxChargeAmount);
        return $this;
    }
}
