<?php

namespace Filipegar\Maxipago\Gateway\Traits;

trait HasCommand
{
    private $command;

    /**
     * Gets the vars contents and unsets it
     * @return string
     */
    public function getAndUnsetCommand()
    {
        $command = $this->getCommand();
        unset($this->command);
        return $command;
    }

    /**
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @param mixed $command
     * @return HasCommand
     */
    public function setCommand($command)
    {
        $this->command = substr($command, 0, 50);
        return $this;
    }
}
