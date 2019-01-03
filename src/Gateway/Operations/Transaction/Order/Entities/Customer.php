<?php

namespace Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class Customer implements OutputsVariables
{
    use ExposesVariables;

    const TYPE_INDIVIDUAL = "Individual";
    const TYPE_COMPANY = "Legal entity";
    const ADDRESS_RESIDENTIAL = "Residential";
    const ADDRESS_COMMERCIAL = "Commercial";
    const SEX_FEMALE = "F";
    const SEX_MALE = "M";

    private $name;
    private $address;
    private $address2;
    private $district;
    private $city;
    private $state;
    private $postalcode;
    private $country;
    private $phone;
    private $email;
    private $companyName;
    private $addressType;
    private $addressNumber;
    private $cpf;
    private $id;
    private $type;
    private $gender;
    private $birthDate;
    private $phones;
    private $documents;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Customer
     */
    public function setName($name)
    {
        $this->name = substr($name, 0, 64);
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return Customer
     */
    public function setAddress($address)
    {
        $this->address = substr($address, 0, 128);
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param mixed $address2
     * @return Customer
     */
    public function setAddress2($address2)
    {
        $this->address2 = substr($address2, 0, 128);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param mixed $district
     * @return Customer
     */
    public function setDistrict($district)
    {
        $this->district = substr($district, 0, 64);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return Customer
     */
    public function setCity($city)
    {
        $this->city = substr($city, 0, 64);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     * @return Customer
     */
    public function setState($state)
    {
        $this->state = substr($state, 0, 32);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * @param mixed $postalcode
     * @return Customer
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = substr(preg_replace('/[^\d]+/i', "", $postalcode), 0, 16);
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     * @return Customer
     */
    public function setCountry($country)
    {
        $this->country = substr($country, 0, 2);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     * @return Customer
     */
    public function setPhone($phone)
    {
        $this->phone = substr(preg_replace('/[^\d]+/i', "", $phone), 0, 16);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = substr($email, 0, 128);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $companyName
     * @return Customer
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = substr($companyName, 0, 64);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressType()
    {
        return $this->addressType;
    }

    /**
     * @param mixed $addressType
     * @return Customer
     */
    public function setAddressType($addressType)
    {
        $this->addressType = $addressType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressNumber()
    {
        return $this->addressNumber;
    }

    /**
     * @param mixed $addressNumber
     * @return Customer
     */
    public function setAddressNumber($addressNumber)
    {
        $this->addressNumber = $addressNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     * @return Customer
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Customer
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Customer
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     * @return Customer
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return string
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     * @return Customer
     */
    public function setBirthDate(\DateTime $birthDate)
    {
        $this->birthDate = $birthDate->format("Y-m-d");
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @param mixed $phones
     * @return Customer
     */
    public function setPhones($phone)
    {
        if (empty($this->phones)) {
            $this->phones = [];
        }
        array_push($this->phones, $phone);
        return $this;
    }

    /**
     * @return array
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * @param Document $document
     * @return Customer
     */
    public function setDocuments(Document $document)
    {
        if (empty($this->documents)) {
            $this->documents = [];
        }
        array_push($this->documents, $document);
        return $this;
    }
}
