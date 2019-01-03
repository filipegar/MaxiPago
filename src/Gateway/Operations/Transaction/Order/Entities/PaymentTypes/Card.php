<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\PaymentTypes;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class Card implements OutputsVariables
{
    use ExposesVariables;

    private $number;
    private $expMonth;
    private $expYear;
    private $cvvNumber;

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     * @return Card
     */
    public function setNumber($number)
    {
        $this->number = substr($number, 0, 19);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpMonth()
    {
        return $this->expMonth;
    }

    /**
     * @param mixed $expMonth
     * @return Card
     */
    public function setExpMonth($expMonth)
    {
        $this->expMonth = substr(sprintf("%02d", $expMonth), 0, 2);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpYear()
    {
        return $this->expYear;
    }

    /**
     * @param mixed $expYear
     * @return Card
     */
    public function setExpYear($expYear)
    {
        $this->expYear = substr(sprintf("%04d", $expYear), 0, 4);
        return $this;
    }

    /**
     * @return string
     */
    public function getCvvNumber()
    {
        return $this->cvvNumber;
    }

    /**
     * @param mixed $cvvNumber
     * @return Card
     */
    public function setCvvNumber($cvvNumber)
    {
        $this->cvvNumber = substr($cvvNumber, 0, 4);
        return $this;
    }
}
