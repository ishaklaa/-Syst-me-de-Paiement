<?php
include_once "Database\connection.php";
class client
{
    protected $id;
    protected $nom;
    protected $email;
    public function __construct($id=null,$nom, $email)
    {
        $this->id =$id;
        $this->nom = $nom;
        $this->email = $email;
    }
    public function getName()
    {
        return $this->nom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setName($name)
    {
         $this->nom=$name;
    }
    public function setEmail($email)
    {
       $this->email=$email;
    }


    
}

