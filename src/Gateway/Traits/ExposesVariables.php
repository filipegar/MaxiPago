<?php

namespace Filipegar\Maxipago\Gateway\Traits;

trait ExposesVariables
{
    public function getVariables()
    {
        return get_object_vars($this);
    }
}
