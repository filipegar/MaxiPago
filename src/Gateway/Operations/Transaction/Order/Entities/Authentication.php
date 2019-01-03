<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class Authentication implements OutputsVariables
{
    const DECLINE = "decline";
    const CONTINUE = "continue";

    use ExposesVariables;

    private $mpiProcessorID;
    private $onFailure;

    /**
     * @return integer
     */
    public function getMpiProcessorID()
    {
        return $this->mpiProcessorID;
    }

    /**
     * @param integer $mpiProcessorId
     * @return Authentication
     */
    public function setMpiProcessorID($mpiProcessorId)
    {
        $this->mpiProcessorID = intval(substr($mpiProcessorId, 0, 2));
        return $this;
    }

    /**
     * @return string
     */
    public function getOnFailure()
    {
        return $this->onFailure;
    }

    /**
     * @param string $onFailure
     * @return Authentication
     */
    public function setOnFailure($onFailure)
    {
        $this->onFailure = substr($onFailure, 0, 50);
        return $this;
    }
}
