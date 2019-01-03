<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\PaymentTypes;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class OnlineDebit implements OutputsVariables
{
    use ExposesVariables;

    private $parametersURL;

    /**
     * @return string
     */
    public function getParametersURL()
    {
        return $this->parametersURL;
    }

    /**
     * @param string $parametersURL
     * @return OnlineDebit
     */
    public function setParametersURL($parametersURL)
    {
        $this->parametersURL = (string)$parametersURL;
        return $this;
    }
}
