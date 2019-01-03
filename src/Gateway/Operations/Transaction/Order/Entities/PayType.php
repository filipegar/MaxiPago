<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\PaymentTypes\Boleto;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\PaymentTypes\CreditCard;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\PaymentTypes\DebitCard;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\PaymentTypes\OnFile;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\PaymentTypes\OnlineDebit;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class PayType implements OutputsVariables
{
    use ExposesVariables;

    private $creditCard;
    private $debitCard;
    private $boleto;
    private $onlineDebit;
    private $onFile;

    public function creditCard()
    {
        $card = new CreditCard();
        $this->setCreditCard($card);

        return $card;
    }

    public function debitCard()
    {
        $card = new DebitCard();
        $this->setDebitCard($card);

        return $card;
    }

    /**
     * @return CreditCard
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * @param CreditCard $creditCard
     * @return PayType
     */
    public function setCreditCard(CreditCard $creditCard)
    {
        $this->creditCard = $creditCard;
        return $this;
    }

    /**
     * @return DebitCard
     */
    public function getDebitCard()
    {
        return $this->debitCard;
    }

    /**
     * @param DebitCard $debitCard
     * @return PayType
     */
    public function setDebitCard(DebitCard $debitCard)
    {
        $this->debitCard = $debitCard;
        return $this;
    }

    /**
     * @return Boleto
     */
    public function getBoleto()
    {
        return $this->boleto;
    }

    /**
     * @param Boleto $boleto
     * @return PayType
     */
    public function setBoleto(Boleto $boleto)
    {
        $this->boleto = $boleto;
        return $this;
    }

    public function boleto()
    {
        $boleto = new Boleto();
        $this->setBoleto($boleto);

        return $boleto;
    }

    /**
     * @return OnlineDebit
     */
    public function getOnlineDebit()
    {
        return $this->onlineDebit;
    }

    /**
     * @param OnlineDebit $onlineDebit
     * @return PayType
     */
    public function setOnlineDebit(OnlineDebit $onlineDebit)
    {
        $this->onlineDebit = $onlineDebit;
        return $this;
    }

    public function onlineDebit()
    {
        $onlineDebit = new OnlineDebit();
        $this->setOnlineDebit($onlineDebit);

        return $onlineDebit;
    }

    /**
     * @return OnFile
     */
    public function getOnFile()
    {
        return $this->onFile;
    }

    /**
     * @param OnFile $onFile
     * @return PayType
     */
    public function setOnFile(OnFile $onFile)
    {
        $this->onFile = $onFile;
        return $this;
    }

    public function onFile()
    {
        $onFile = new OnFile();
        $this->setOnFile($onFile);

        return $onFile;
    }
}
