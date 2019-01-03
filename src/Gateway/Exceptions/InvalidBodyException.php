<?php


namespace Filipegar\Maxipago\Gateway\Exceptions;

class InvalidBodyException extends \Exception
{
    /**
     * InvalidBodyException constructor.
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
