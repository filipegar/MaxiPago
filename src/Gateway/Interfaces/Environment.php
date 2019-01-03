<?php

namespace Filipegar\Maxipago\Gateway\Interfaces;

interface Environment
{
    /**
     * Gets the environment API registration URL
     *
     * @return string the API URL
     */
    public function getApiUrl();

    /**
     * Gets the environment API version
     *
     * @return string API version
     */
    public function getApiVersion();
}
