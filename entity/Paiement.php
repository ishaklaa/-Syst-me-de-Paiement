<?php
include_once "Database\connection.php";
include_once "entity\Commande.php";
class paiement {
    protected $id;
    protected $montant ;
    protected $statut;
    protected $type;
    protected $date_paie;
    protected $commande_id;
    public function __construct($id=null,$montant,$statut,$type,$date_paie=null,$commande_id)
    {
        $this->id=$id;
        $this->montant=$montant;
        $this->statut=$statut;
        $this->type=$type;
        $this->date_paie=$date_paie;
        $this->commande_id=$commande_id;
    }
    public function getId(){
       return $this->id;
    }
    public function getMontant(){
       return $this->montant;
    }
    public function getStatut(){
       return $this->statut;
    }
    public function getType(){
       return $this->type;
    }
    public function getDate_paie(){
       return $this->date_paie;
    }
    public function getCommande_id(){
       return $this->commande_id;
    }
}