<?php

namespace Filipegar\Maxipago\Gateway\Operations\Report;

use Filipegar\Maxipago\Gateway\Interfaces\NonTransaction;
use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;
use Filipegar\Maxipago\Gateway\Traits\HasCommand;

class CheckRequestStatus extends ApiRequest implements NonTransaction, OutputsVariables
{
    use HasCommand, ExposesVariables;

    private $requestToken;

    public function __construct()
    {
        $this->setCommand("checkRequestStatus");
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
     * @return CheckRequestStatus
     */
    public function setRequestToken($requestToken)
    {
        $this->requestToken = $requestToken;
        return $this;
    }
}
