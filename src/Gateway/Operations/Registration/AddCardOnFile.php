<?php

namespace Filipegar\Maxipago\Gateway\Operations\Registration;

use Filipegar\Maxipago\Gateway\Interfaces\NonTransaction;
use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Operations\Registration\Entities\CardOnFile;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;
use Filipegar\Maxipago\Gateway\Traits\HasCommand;

class AddCardOnFile extends ApiRequest implements NonTransaction, OutputsVariables
{
    use HasCommand, ExposesVariables;

    private $request;

    public function __construct()
    {
        $this->setCommand("add-card-onfile");
    }

    /**
     * @return CardOnFile
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed $request
     * @return AddCardOnFile
     */
    public function setRequest(CardOnFile $request)
    {
        $this->request = $request;
        return $this;
    }

    public function cardOnFile($customerId)
    {
        $cardOnFile = new CardOnFile($customerId);
        $this->setRequest($cardOnFile);

        return $cardOnFile;
    }
}
