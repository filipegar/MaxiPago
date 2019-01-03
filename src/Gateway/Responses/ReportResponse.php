<?php

namespace Filipegar\Maxipago\Gateway\Responses;

use Filipegar\Maxipago\Gateway\Operations\Report\Entities\ReportRecord;

class ReportResponse
{
    protected $records = [];
    private $time;
    private $command;
    private $totalNumberOfRecords;
    private $pageToken;
    private $pageNumber;
    private $numberOfPages;
    private $requestToken;
    private $statusMessage;

    public static function fromXML(\SimpleXMLElement $xml)
    {
        $reportResponse = new ReportResponse();
        $reportResponse->populate($xml);

        return $reportResponse;
    }

    public function populate(\SimpleXMLElement $xml)
    {
        $this->time = isset($xml->header->time) ? \DateTime::createFromFormat(
            "m-d-Y H:i:s",
            (string)$xml->header->time
        ) : null;
        $this->command = isset($xml->header->command) ? (string)$xml->header->command : null;
        $this->totalNumberOfRecords = isset($xml->result->resultSetInfo->totalNumberOfRecords) ? (string)$xml->result->resultSetInfo->totalNumberOfRecords : null;
        $this->pageNumber = isset($xml->result->resultSetInfo->pageNumber) ? (string)$xml->result->resultSetInfo->pageNumber : null;
        $this->pageToken = isset($xml->result->resultSetInfo->pageToken) ? (string)$xml->result->resultSetInfo->pageToken : null;
        $this->numberOfPages = isset($xml->result->resultSetInfo->numberOfPages) ? (string)$xml->result->resultSetInfo->numberOfPages : null;
        $this->requestToken = isset($xml->result->requestToken) ? (string)$xml->result->requestToken : null;
        $this->statusMessage = isset($xml->result->statusMessage) ? (string)$xml->result->statusMessage : null;
        if (isset($xml->result->records->record)) {
            foreach ($xml->result->records->record as $item) {
                array_push($this->records, (new ReportRecord())->populate($item));
            }
        }
    }

    /**
     * @return array
     */
    public function getRecords()
    {
        return $this->records;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return mixed
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @return mixed
     */
    public function getTotalNumberOfRecords()
    {
        return $this->totalNumberOfRecords;
    }

    /**
     * @return mixed
     */
    public function getPageToken()
    {
        return $this->pageToken;
    }

    /**
     * @return mixed
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * @return mixed
     */
    public function getNumberOfPages()
    {
        return $this->numberOfPages;
    }

    /**
     * @return mixed
     */
    public function getRequestToken()
    {
        return $this->requestToken;
    }

    /**
     * @param mixed $requestToken
     * @return ReportResponse
     */
    public function setRequestToken($requestToken)
    {
        $this->requestToken = $requestToken;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    /**
     * @param mixed $statusMessage
     * @return ReportResponse
     */
    public function setStatusMessage($statusMessage)
    {
        $this->statusMessage = $statusMessage;
        return $this;
    }
}
