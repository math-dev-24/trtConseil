<?php

class User{
    private $id;
    private $email;
    private $password;
    private $approuver;
    private $idType;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    public function hydrate(array $data){
        foreach($data as $key=> $value){
            $method = "set".ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

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
     * Get the value of approuver
     */ 
    public function getApprouver()
    {
        return $this->approuver;
    }

    /**
     * Set the value of approuver
     *
     * @return  self
     */ 
    public function setApprouver($approuver)
    {
        $this->approuver = $approuver;

        return $this;
    }

    /**
     * Get the value of idType
     */ 
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * Set the value of idType
     *
     * @return  self
     */ 
    public function setIdType($idType)
    {
        $this->idType = $idType;

        return $this;
    }
}