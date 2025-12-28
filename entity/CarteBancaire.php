<?php
include_once "Repository\PaiementRepository.php";
include_once "entity\Paiement.php";
class CarteBancaire extends paiement
{
    protected $carte_id;
    protected $email;
    protected $password;
    public function __construct($id=null, $montant, $statut, $type, $date_paie=null, $commande_id,$carte_id,$email,$password)
    {
        parent::__construct($id=null, $montant, $statut, $type, $date_paie=null, $commande_id);
        $this->carte_id=$carte_id;
        $this->email=$email;
        $this->password=$password;
    }
    public function getCarte_id(){
        return $this->carte_id;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
}