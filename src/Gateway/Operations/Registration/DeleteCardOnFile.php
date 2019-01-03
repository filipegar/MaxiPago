<?php

namespace Filipegar\Maxipago\Gateway\Operations\Registration;

use Filipegar\Maxipago\Gateway\Interfaces\NonTransaction;
use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Operations\Registration\Entities\CardOnFile;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;
use Filipegar\Maxipago\Gateway\Traits\HasCommand;

class DeleteCardOnFile extends ApiRequest implements NonTransaction, OutputsVariables
{
    use HasCommand, ExposesVariables;

    private $request;

    public function __construct()
    {
        $this->setCommand("delete-card-onfile");
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
     * @return DeleteCardOnFile
     */
    public function setRequest(CardOnFile $request)
    {
        $this->request = $request;
        return $this;
    }

    public function cardOnFile($customerId, $token)
    {
        $cardOnFile = new CardOnFile($customerId);
        $cardOnFile->setToken($token);
        $this->setRequest($cardOnFile);

        return $cardOnFile;
    }
}
