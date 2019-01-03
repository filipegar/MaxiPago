<?php

namespace Filipegar\Maxipago\Gateway\Operations\Registration\Entities;

use Filipegar\Maxipago\Gateway\Interfaces\OutputsVariables;
use Filipegar\Maxipago\Gateway\Traits\ExposesVariables;

class Consumer implements OutputsVariables
{
    use ExposesVariables;

    const SEX_FEMALE = "F";
    const SEX_MALE = "M";

    private $customerId;
    private $customerIdExt;
    private $firstName;
    private $lastName;
    private $name;
    private $address1;
    private $address2;
    private $city;
    private $state;
    private $zip;
    private $country;
    private $phone;
    private $email;
    private $dob;
    private $sex;
    private $customField1;
    private $customField2;

    /**
     * @return integer
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $customerId
     * @return Consumer
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = intval($customerId);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerIdExt()
    {
        return $this->customerIdExt;
    }

    /**
     * @param mixed $customerIdExt
     * @return Consumer
     */
    public function setCustomerIdExt($customerIdExt)
    {
        $this->customerIdExt = $customerIdExt;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return Consumer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = substr($firstName, 0, 64);
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     * @return Consumer
     */
    public function setLastName($lastName)
    {
        $this->lastName = substr($lastName, 0, 64);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Consumer
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param mixed $address1
     * @return Consumer
     */
    public function setAddress1($address1)
    {
        $this->address1 = substr($address1, 0, 128);
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
     * @return Consumer
     */
    public function setAddress2($address2)
    {
        $this->address2 = substr($address2, 0, 128);
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return Consumer
     */
    public function setCity($city)
    {
        $this->city = substr($city, 0, 64);
        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     * @return Consumer
     */
    public function setState($state)
    {
        $this->state = substr($state, 0, 2);
        return $this;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     * @return Consumer
     */
    public function setZip($zip)
    {
        $this->zip = substr($zip, 0, 9);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     * @return Consumer
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
     * @return Consumer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
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
     * @return Consumer
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param \DateTime $dob
     * @return Consumer
     */
    public function setDob(\DateTime $dob)
    {
        $this->dob = $dob->format('d/m/Y');
        return $this;
    }

    /**
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     * @return Consumer
     */
    public function setSex($sex)
    {
        $this->sex = substr($sex, 0, 1);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomField1()
    {
        return $this->customField1;
    }

    /**
     * @param mixed $customField1
     * @return Consumer
     */
    public function setCustomField1($customField1)
    {
        $this->customField1 = $customField1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomField2()
    {
        return $this->customField2;
    }

    /**
     * @param mixed $customField2
     * @return Consumer
     */
    public function setCustomField2($customField2)
    {
        $this->customField2 = $customField2;
        return $this;
    }
}
