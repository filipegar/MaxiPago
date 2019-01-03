<?php


namespace Filipegar\Maxipago\Gateway\Exceptions;

use Filipegar\Maxipago\Gateway\Interfaces\MaxipagoException;

class TransactionException extends \Exception implements MaxipagoException
{
    /**
     * TransactionException constructor.
     *
     * @param $message
     * @param $code
     * @param null $previous
     */
    public function __construct($message, $code, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
