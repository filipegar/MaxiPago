<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class Document implements OutputsVariables
{
    use ExposesVariables;

    const TYPE_CPF = "CPF";
    const TYPE_RG = "RG";
    const TYPE_CNPJ = "CNPJ";
    const TYPE_STATE = "StateRegistration";
    const TYPE_MUNICIPAL = "MunicipalRegistration";
    const TYPE_PASSPORT = "Passport";
    const TYPE_CTPS = "CTPS";
    const TYPE_VOTER = "VoterDocument";

    private $documentType;
    private $documentValue;

    /**
     * @return mixed
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * @param mixed $documentType
     * @return Document
     */
    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDocumentValue()
    {
        return $this->documentValue;
    }

    /**
     * @param mixed $documentValue
     * @return Document
     */
    public function setDocumentValue($documentValue)
    {
        $this->documentValue = $documentValue;
        return $this;
    }
}
