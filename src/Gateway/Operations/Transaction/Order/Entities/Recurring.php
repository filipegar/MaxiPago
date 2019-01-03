<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class Recurring implements OutputsVariables
{
    use ExposesVariables;

    const ACTION_NEW = 'new';
    const ACTION_ENABLE = 'enable';
    const ACTION_DISABLE = 'disable';
    const PERIOD_DAILY = 'daily';
    const PERIOD_WEEKLY = 'weekly';
    const PERIOD_MONTHLY = 'monthly';
    const PERIOD_BIMONTHLY = 'biMonthly';
    const PERIOD_QUARTERLY = 'quarterly';
    const PERIOD_SEMIANNUAL = 'semiannual';
    const PERIOD_ANNUAL = 'annual';

    private $action;
    private $startDate;
    private $frequency;
    private $period;
    private $installments;
    private $firstAmount;
    private $lastAmount;
    private $lastDate;
    private $failureThreshold;
    private $processorID;
    private $nextFireDate;
    private $fireDay;

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     * @return Recurring
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     * @return Recurring
     */
    public function setStartDate(\DateTime $startDate)
    {
        $this->startDate = $startDate->format('Y-m-d');
        return $this;
    }

    /**
     * @return integer
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param mixed $frequency
     * @return Recurring
     */
    public function setFrequency($frequency)
    {
        $this->frequency = intval($frequency);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     * @return Recurring
     */
    public function setPeriod($period)
    {
        $validPeriods = ['daily', 'weekly', 'monthly', 'biMonthly', 'quarterly', 'semiannual', 'annual'];
        if (!in_array($period, $validPeriods)) {
            throw new \InvalidArgumentException("Period is not valid. Check Maxipago docs.");
        }

        $this->period = $period;
        return $this;
    }

    /**
     * @return integer
     */
    public function getInstallments()
    {
        return $this->installments;
    }

    /**
     * @param mixed $installments
     * @return Recurring
     */
    public function setInstallments($installments)
    {
        $this->installments = intval($installments);
        return $this;
    }

    /**
     * @return float
     */
    public function getFirstAmount()
    {
        return $this->firstAmount;
    }

    /**
     * @param mixed $firstAmount
     * @return Recurring
     */
    public function setFirstAmount($firstAmount)
    {
        $this->firstAmount = floatval($firstAmount);
        return $this;
    }

    /**
     * @return float
     */
    public function getLastAmount()
    {
        return $this->lastAmount;
    }

    /**
     * @param mixed $lastAmount
     * @return Recurring
     */
    public function setLastAmount($lastAmount)
    {
        $this->lastAmount = floatval($lastAmount);
        return $this;
    }

    /**
     * @return string
     */
    public function getLastDate()
    {
        return $this->lastDate;
    }

    /**
     * @param \DateTime $lastDate
     * @return Recurring
     */
    public function setLastDate(\DateTime $lastDate)
    {
        $this->lastDate = $lastDate->format('Y-m-d');
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFailureThreshold()
    {
        return $this->failureThreshold;
    }

    /**
     * @param mixed $failureThreshold
     * @return Recurring
     */
    public function setFailureThreshold($failureThreshold)
    {
        $this->failureThreshold = $failureThreshold;
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
     * @return Recurring
     */
    public function setProcessorID($processorID)
    {
        $this->processorID = $processorID;
        return $this;
    }

    /**
     * @return string
     */
    public function getNextFireDate()
    {
        return $this->nextFireDate;
    }

    /**
     * @param \DateTime $nextFireDate
     * @return Recurring
     */
    public function setNextFireDate(\DateTime $nextFireDate)
    {
        $this->nextFireDate = $nextFireDate->format('Y-m-d');
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFireDay()
    {
        return $this->fireDay;
    }

    /**
     * @param mixed $fireDay
     * @return Recurring
     */
    public function setFireDay($fireDay)
    {
        $this->fireDay = $fireDay;
        return $this;
    }
}
