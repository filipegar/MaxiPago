<?php

namespace Filipegar\Maxipago\Gateway\Operations\Report;

use Filipegar\Maxipago\Gateway\Interfaces\NonTransaction;
use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Operations\Report\Entities\FilterOptions;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;
use Filipegar\Maxipago\Gateway\Traits\HasCommand;

class TransactionDetailReport extends ApiRequest implements NonTransaction, OutputsVariables
{
    use HasCommand, ExposesVariables;

    private $filterOptions;

    public function __construct()
    {
        $this->setCommand("transactionDetailReport");
    }

    /**
     * @return mixed
     */
    public function getFilterOptions()
    {
        return $this->filterOptions;
    }

    /**
     * @param mixed $filterOptions
     * @return TransactionDetailReport
     */
    public function setFilterOptions($filterOptions)
    {
        $this->filterOptions = $filterOptions;
        return $this;
    }

    public function filterOptions()
    {
        $filterOptions = new FilterOptions();
        $this->setFilterOptions($filterOptions);

        return $filterOptions;
    }
}
