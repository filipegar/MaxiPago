<?php

namespace Filipegar\Maxipago\Gateway\Operations\Report\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class FilterOptions implements OutputsVariables
{
    use ExposesVariables;

    const PERIOD_TODAY = "today";
    const PERIOD_YESTERDAY = "yesterday";
    const PERIOD_LASTMONTH = "lastmonth";
    const PERIOD_THISMONTH = "thismonth";
    const PERIOD_RANGE = "range";
    const ORDERBY_TRANSACTIONDATE = "transactionDate";
    const ORDERBY_TRANSACTIONAMOUNT = "transactionAmount";
    const ORDERBY_TRANSACTIONTYPE = "transactionType";
    const ORDERBY_TRANSACTIONID = "transactionId";
    const ORDERBY_BILLINGNAME = "billingName";
    const ORDERBY_ORDERID = "orderId";
    const ORDERBY_PAYMENTTYPE = "paymentType";
    const ORDERBY_STATUS = "status";
    const ORDERBY_ASC = "asc";
    const ORDERBY_DESC = "desc";

    private $transactionId;
    private $orderId;
    private $period;
    private $pageSize;
    private $startDate;
    private $endDate;
    private $startTime;
    private $endTime;
    private $orderByName;
    private $orderByDirection;
    private $startRecordNumber;
    private $endRecordNumber;
    private $pageToken;
    private $pageNumber;

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param mixed $transactionId
     * @return FilterOptions
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
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
     * @return FilterOptions
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
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
     * @return FilterOptions
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param mixed $pageSize
     * @return FilterOptions
     */
    public function setPageSize($pageSize)
    {
        if (intval($pageSize) > 100) {
            throw new \InvalidArgumentException("Max page size is 100.");
        }

        $this->pageSize = $pageSize;
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
     * @return FilterOptions
     */
    public function setStartDate(\DateTime $startDate)
    {
        $this->startDate = $startDate->format("m/d/Y");
        return $this;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     * @return FilterOptions
     */
    public function setEndDate(\DateTime $endDate)
    {
        $this->endDate = $endDate->format("m/d/Y");
        return $this;
    }

    /**
     * @return string
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param \DateTime $startTime
     * @return FilterOptions
     */
    public function setStartTime(\DateTime $startTime)
    {
        $this->startTime = $startTime->format("H:i:s");
        return $this;
    }

    /**
     * @return string
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param \DateTime $endTime
     * @return FilterOptions
     */
    public function setEndTime(\DateTime $endTime)
    {
        $this->endTime = $endTime->format("H:i:s");
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderByName()
    {
        return $this->orderByName;
    }

    /**
     * @param mixed $orderByName
     * @return FilterOptions
     */
    public function setOrderByName($orderByName)
    {
        $this->orderByName = $orderByName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderByDirection()
    {
        return $this->orderByDirection;
    }

    /**
     * @param mixed $orderByDirection
     * @return FilterOptions
     */
    public function setOrderByDirection($orderByDirection)
    {
        $this->orderByDirection = $orderByDirection;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartRecordNumber()
    {
        return $this->startRecordNumber;
    }

    /**
     * @param mixed $startRecordNumber
     * @return FilterOptions
     */
    public function setStartRecordNumber($startRecordNumber)
    {
        $this->startRecordNumber = $startRecordNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndRecordNumber()
    {
        return $this->endRecordNumber;
    }

    /**
     * @param mixed $endRecordNumber
     * @return FilterOptions
     */
    public function setEndRecordNumber($endRecordNumber)
    {
        $this->endRecordNumber = $endRecordNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPageToken()
    {
        return $this->pageToken;
    }

    /**
     * @param mixed $pageToken
     * @return FilterOptions
     */
    public function setPageToken($pageToken)
    {
        $this->pageToken = $pageToken;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * @param mixed $pageNumber
     * @return FilterOptions
     */
    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;
        return $this;
    }

    /**
     * @param \DateTime $dateTime
     * @return $this
     */
    public function setStartDateTime(\DateTime $dateTime)
    {
        $this->setStartDate($dateTime);
        $this->setStartTime($dateTime);
        return $this;
    }

    /**
     * @param \DateTime $dateTime
     * @return $this
     */
    public function setEndDateTime(\DateTime $dateTime)
    {
        $this->setEndDate($dateTime);
        $this->setEndTime($dateTime);
        return $this;
    }
}
