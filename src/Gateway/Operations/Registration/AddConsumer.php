<?php

namespace Filipegar\Maxipago\Gateway\Operations\Registration;

use Filipegar\Maxipago\Gateway\Interfaces\NonTransaction;
use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Operations\Registration\Entities\Consumer;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;
use Filipegar\Maxipago\Gateway\Traits\HasCommand;

class AddConsumer extends ApiRequest implements NonTransaction, OutputsVariables
{
    use HasCommand, ExposesVariables;

    private $request;

    public function __construct()
    {
        $this->setCommand("add-consumer");
    }

    /**
     * @return Consumer
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed $request
     * @return AddConsumer
     */
    public function setRequest(Consumer $request)
    {
        $this->request = $request;
        return $this;
    }

    public function consumer()
    {
        $consumer = new Consumer();
        $this->setRequest($consumer);

        return $consumer;
    }
}
