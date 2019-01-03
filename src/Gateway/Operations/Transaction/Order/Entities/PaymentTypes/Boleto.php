<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\PaymentTypes;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class Boleto implements OutputsVariables
{
    use ExposesVariables;

    private $expirationDate;
    private $number;
    private $instructions;

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param mixed $expirationDate
     * @return Boleto
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     * @return Boleto
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstructions()
    {
        return $this->instructions;
    }

    /**
     * @param mixed $instructions
     * @return Boleto
     */
    public function setInstructions($instructions)
    {
        $this->instructions = $instructions;
        return $this;
    }
}
