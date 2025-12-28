<?php
include_once "entity\Paiement.php";
class PaiementRepository{
private $conn;
    public function __construct()
    {
        $this->conn = new Connection()->connect();
    }
    public function createPaiement($paiement){
        $query = "insert into paiements (montant,commande_id,statu,type) values (:montant,:commande_id,:statu,:type) ";
        $stmt=$this->conn->prepare($query);
        $montant = $paiement->getMontant();
        $commande_id =$paiement-> getCommande_id();
        $statu =$paiement->getStatut();
        $type =$paiement->getType();
        $stmt->bindParam(":montant",$montant);
        $stmt->bindParam(":commande_id",$commande_id);
        $stmt->bindParam(":statu",$statu);
        $stmt->bindParam(":type",$type);
        $stmt->execute();
    }
    public function getAllpaiemments()
    {
        $query = "select * from paiements";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $allpaiements_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $paiements = [];
        foreach ($allpaiements_array as $pmt) {
            $paiements [] = new paiement ($pmt["id"],$pmt["montant"],$pmt["statu"],$pmt["type"],$pmt["date_paiement"],$pmt["commande_id"]);
        }
        return $paiements;
    }
    public function getCommandeMontant($commande_id){
        $query = "select montant_total from commandes where id = $commande_id ";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $commande_montant= $stmt->fetch(PDO::FETCH_ASSOC);
        $montant = $commande_montant["montant_total"];
        return $montant;
    }
}