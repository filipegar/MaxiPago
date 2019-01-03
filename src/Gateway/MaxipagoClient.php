<?php

namespace Filipegar\Maxipago\Gateway;

use Filipegar\Maxipago\Gateway\Operations\Registration\ApiRequest;
use Filipegar\Maxipago\Gateway\Operations\Registration\GenericRegistration;
use Filipegar\Maxipago\Gateway\Operations\Report\ApiRequest as Report;
use Filipegar\Maxipago\Gateway\Operations\Report\GenericReport;
use Filipegar\Maxipago\Gateway\Operations\Transaction\GenericTransaction;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Order;
use Filipegar\Maxipago\Gateway\Requests\RegistrationRequest;
use Filipegar\Maxipago\Gateway\Requests\ReportRequest;
use Filipegar\Maxipago\Gateway\Requests\TransactionRequest;
use Filipegar\Maxipago\Merchant;

class MaxipagoClient
{
    private $merchant;
    private $environment;

    /**
     * Create an instance of Maxipago choosing the environment where the
     * requests will be send.
     *
     * @param Merchant $merchant
     *            The merchant credentials (Store id and store secret key).
     * @param Environment environment
     *            The environment: {@link Environment::production()} or
     *            {@link Environment::sandbox()}.
     */
    public function __construct(Merchant $merchant, Environment $environment = null)
    {
        if (is_null($environment)) {
            $environment = Environment::production();
        }

        $this->merchant = $merchant;
        $this->environment = $environment;
    }


    /**
     * @param Order $order
     * @return Responses\TransactionResponse
     * @throws Interfaces\MaxipagoException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function transaction(Order $order)
    {
        $transaction = new GenericTransaction($this->environment, $this->merchant, $order);
        return (new TransactionRequest($this->environment))->execute($transaction);
    }

    /**
     * @param ApiRequest $request
     * @return Responses\RegistrationResponse
     * @throws Interfaces\MaxipagoException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function registration(ApiRequest $request)
    {
        $registration = new GenericRegistration($this->merchant, $request);
        return (new RegistrationRequest($this->environment))->execute($registration);
    }

    /**
     * @param Report $request
     * @return Responses\ReportResponse
     * @throws Interfaces\MaxipagoException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function report(Report $request)
    {
        $report = new GenericReport($this->merchant, $request);
        return (new ReportRequest($this->environment))->execute($report);
    }
}
