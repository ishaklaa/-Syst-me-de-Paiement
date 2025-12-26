<?php
include_once "entity\Client.php";

class ClientRepository
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Connection()->connect();
    }
    public function createClient($client)
    {
        $query = "insert into clients (name,email) values (:nom,:email)";
        $stmt = $this->conn->prepare($query);
        $name = $client->getName();
        $email = $client->getEmail();
        $stmt->bindParam("nom", $name);
        $stmt->bindParam("email", $email);
        $stmt->execute();
    }
    public function getAllClients()
    {
        $query = "select * from clients";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $allclients_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $clients = [];
        foreach ($allclients_array as $row) {
            $clients[] = new Client($row["id"],$row["name"], $row["email"]);
        }
     return $clients;
       
    }
     
}
