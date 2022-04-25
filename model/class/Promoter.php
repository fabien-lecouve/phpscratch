<?php

class Promoter {
    private int $idPromoter;
    private string $name;
    private string $address;
    private string $zip;
    private string $city;
    private string $country;
    private string $siret;
    private string $legalStatus;
    private string $creationTime;

    public function __construct($idPromoter, $name, $address, $zip, $city, $country, $siret, $legalStatus, $creationTime)
    {
        $this->idPromoter = $idPromoter;
        $this->name = $name;
        $this->address = $address;
        $this->zip = $zip;
        $this->city = $city;
        $this->country = $country;
        $this->siret = $siret;
        $this->legalStatus = $legalStatus;
        $this->creationTime = $creationTime;
    }

    /**
     * Get the value of idPromoter
     */ 
    public function getIdPromoter()
    {
        return $this->idPromoter;
    }

    /**
     * Set the value of idPromoter
     *
     * @return  self
     */ 
    public function setIdPromoter($idPromoter)
    {
        $this->idPromoter = $idPromoter;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of zip
     */ 
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set the value of zip
     *
     * @return  self
     */ 
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of country
     */ 
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */ 
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of siret
     */ 
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set the value of siret
     *
     * @return  self
     */ 
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get the value of legalStatus
     */ 
    public function getLegalStatus()
    {
        return $this->legalStatus;
    }

    /**
     * Set the value of legalStatus
     *
     * @return  self
     */ 
    public function setLegalStatus($legalStatus)
    {
        $this->legalStatus = $legalStatus;

        return $this;
    }

    /**
     * Get the value of creationTime
     */ 
    public function getCreationTime()
    {
        return $this->creationTime;
    }

    /**
     * Set the value of creationTime
     *
     * @return  self
     */ 
    public function setCreationTime($creationTime)
    {
        $this->creationTime = $creationTime;

        return $this;
    }
}