<?php

namespace Filipegar\Maxipago\Gateway\Operations\Registration\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class PaymentInfo implements OutputsVariables
{
    use ExposesVariables;

    private $cardInfo;
    private $chargeTotal;

    /**
     * @return CardInfo
     */
    public function getCardInfo()
    {
        return $this->cardInfo;
    }

    /**
     * @param CardInfo $cardInfo
     * @return PaymentInfo
     */
    public function setCardInfo(CardInfo $cardInfo)
    {
        $this->cardInfo = $cardInfo;
        return $this;
    }

    /**
     * @return CardInfo
     */
    public function cardInfo()
    {
        $cardInfo = new CardInfo();
        $this->setCardInfo($cardInfo);
        return $cardInfo;
    }

    /**
     * @return float
     */
    public function getChargeTotal()
    {
        return $this->chargeTotal;
    }

    /**
     * @param mixed $chargeTotal
     * @return PaymentInfo
     */
    public function setChargeTotal($chargeTotal)
    {
        $this->chargeTotal = floatval($chargeTotal);
        return $this;
    }
}
