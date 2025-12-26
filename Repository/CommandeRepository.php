<?php
include_once "entity\Commande.php";

class CommandeRepository
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Connection()->connect();
    }
    public function createCommande($commande)
    {
        $query = "insert into commandes (client_id,montant_total,statu) values (:client_id,:montant_total,:statu)";
        $stmt = $this->conn->prepare($query);
        $client_id = $commande->getClient_id();
        $montant_total = $commande->getMontant();
        $statu = $commande->getStatut();
        $stmt->bindParam("client_id", $client_id);
        $stmt->bindParam("montant_total", $montant_total);
        $stmt->bindParam("statu", $statu);
        $stmt->execute();
    }
    public function getAllCommandes()
    {
        $query = "select * from commandes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $allcommandes_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $commandes = [];
        foreach ($allcommandes_array as $cmd) {
            $commandes [] = new commande($cmd["id"],$cmd["montant_total"],$cmd["statu"],$cmd["client_id"]);
        }
        return $commandes;
    }
}
