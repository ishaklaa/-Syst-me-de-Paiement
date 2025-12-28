<?php
include_once "entity\Client.php";
include_once "Database\connection.php";


class Commande
{
    protected $id ;
    protected $montant_total ;
    protected  $statu;
    protected $client_id;

    public function __construct($id=null,$montant_total,$statu,$client_id)
    {
        $this->id = $id;
        $this->montant_total = $montant_total;
        $this->statu = $statu;
        $this->client_id= $client_id;
    }
    public function getId(){
        return $this->id;
    }
    public function getMontant(){
        return $this->montant_total;
    }
    public function getStatut(){
        return $this->statu;
    }
    public function getClient_id(){
        return $this->client_id;
    }
    
}



?>