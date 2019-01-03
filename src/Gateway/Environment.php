<?php

namespace Filipegar\Maxipago\Gateway;

use Filipegar\Maxipago\Gateway\Interfaces\Environment as IEnvironment;

class Environment implements IEnvironment
{
    protected $apiVersion = "3.1.1.15";
    private $apiUrl;
    private $reportUrl;

    /**
     * Environment constructor.
     *
     * @param $transactionUrl
     * @param $apiUrl
     * @param $reportUrl
     */
    private function __construct($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * @return Environment
     */
    public static function sandbox()
    {
        $api = "https://testapi.maxipago.net/";

        return new Environment($api);
    }

    /**
     * @return Environment
     */
    public static function production()
    {
        $api = "https://api.maxipago.net/";

        return new Environment($api);
    }

    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    public function getApiVersion()
    {
        return $this->apiVersion;
    }
}
