<?php 

class Admin {
    private ?int $idAdmin;
    private ?string $lastname;
    private ?string $firstname;
    private ?string $email;
    private ?string $password;
    private ?string $creationTime;
    private ?int $idRole;
    private ?int $idPromoter;
    private Role $Role;
    private Promoter $Promoter;

    public function __construct($idAdmin, $lastname, $firstname, $email, $password, $creationTime, $idRole, $idPromoter)
    {
        $this->idAdmin = $idAdmin;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->password = $password;
        $this->creationTime = $creationTime;
        $this->idRole = $idRole;
        $this->idPromoter = $idPromoter;
    }
    

    /**
     * Get the value of idAdmin
     */ 
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    /**
     * Set the value of idAdmin
     *
     * @return  self
     */ 
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

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

    /**
     * Get the value of idRole
     */ 
    public function getIdRole()
    {
        return $this->idRole;
    }

    /**
     * Get the value of idPromoter
     */ 
    public function getIdPromoter()
    {
        return $this->idPromoter;
    }

    /**
     * Get the value of Role
     */ 
    public function getRole()
    {
        return $this->Role;
    }

    /**
     * Set the value of Role
     *
     * @return  self
     */ 
    public function setRole($Role)
    {
        $this->Role = $Role;

        return $this;
    }

    /**
     * Get the value of Promoter
     */ 
    public function getPromoter()
    {
        return $this->Promoter;
    }

    /**
     * Set the value of Promoter
     *
     * @return  self
     */ 
    public function setPromoter($Promoter)
    {
        $this->Promoter = $Promoter;

        return $this;
    }

}