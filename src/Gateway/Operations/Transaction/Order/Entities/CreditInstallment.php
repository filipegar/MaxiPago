<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class CreditInstallment implements OutputsVariables
{
    use ExposesVariables;

    private $numberOfInstallments;
    private $chargeInterest;

    /**
     * CreditInstallment constructor.
     *
     * @param integer $numberOfInstallments
     * @param bool $chargeInterest
     */
    public function __construct($numberOfInstallments, $chargeInterest = false)
    {
        if ($numberOfInstallments === 1 || $numberOfInstallments > 12) {
            throw new \InvalidArgumentException("Number of Installments should be more than 1 and less then 12");
        }

        $this->setNumberOfInstallments($numberOfInstallments);
        $this->setChargeInterest($chargeInterest);
    }

    /**
     * @return integer
     */
    public function getNumberOfInstallments()
    {
        return $this->numberOfInstallments;
    }

    /**
     * @param integer $numberOfInstallments
     * @return CreditInstallment
     */
    public function setNumberOfInstallments($numberOfInstallments)
    {
        $this->numberOfInstallments = $numberOfInstallments;
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
     * @param boolean $chargeInterest
     * @return CreditInstallment
     */
    public function setChargeInterest($chargeInterest)
    {
        if (boolval($chargeInterest) === true) {
            $this->chargeInterest = "Y";
        } else {
            $this->chargeInterest = "N";
        }
        return $this;
    }
}
