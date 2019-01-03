<?php

namespace Filipegar\Maxipago\Gateway\Interfaces;

interface NonTransaction
{
    public function getCommand();

    public function getAndUnsetCommand();

    public function setCommand($command);
}
