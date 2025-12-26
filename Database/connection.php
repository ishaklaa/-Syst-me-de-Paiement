<?php
class Connection 
{
   private $conn;
   private $user = "root";
   private $hostname = "localhost";
   private $dbname = "système_de_paiement";
   private $dbpass = "";
   
   public function __construct()
   {
    $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname;charset=utf8mb4", $this->user, $this->dbpass);
    
   }
   public function connect(){
    return $this->conn;
   }
}





?>