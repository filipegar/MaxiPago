<?php


namespace Filipegar\Maxipago\Gateway\Interfaces;

interface Requestable
{
    /**
     * @return mixed
     */
    public function toRequest();
}
