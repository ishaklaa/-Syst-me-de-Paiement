<?php
include_once "Repository\PaiementRepository.php";
include_once "entity\Paiement.php";
class Paypal extends paiement
{
    protected $paypal_id;
    protected $email;
    protected $password;
    public function __construct($id=null, $montant, $statut, $type, $date_paie=null, $commande_id,$paypal_id,$email,$password)
    {
        parent::__construct($id=null, $montant, $statut, $type, $date_paie=null, $commande_id);
        $this->paypal_id=$paypal_id;
        $this->email=$email;
        $this->password=$password;
    }
    public function getCarte_id(){
        return $this->paypal_id;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
}