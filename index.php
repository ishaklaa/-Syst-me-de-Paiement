<?php
include_once "Repository\ClientRepository.php";
$clientRepository = new ClientRepository();
while (true) {
    $choix = readline("1- créér un compte: \n2- afficher tout les comptes: \n 3- faire une commande: \n4- afficher tout les commandes: \nVeuiller entrez votre choix : \nVeuiller entrez votre choix : ");

    switch ($choix) {

        case 1:
            $name = readline("entrer votre nom :");
            $email = readline("entrer votre email :");
            $client = new client($id ,$name, $email);
            $clientRepository->createClient($client);
            break;

        case 2:
            
            $clients = $clientRepository->getAllClients();
            foreach($clients as $cl){
              $name= $cl->getName();
              $email=$cl->getEmail();
              $id= $cl->getId();
              echo "id: ".$id.  "\nname :" .$name. "\nemail : " .$email. "\n\n";      
            }
            break;
        case 3:  
            $montant = readline("entrer le montant :");
            // $statu = readline("entrer votre email :");

            $client = new client($id ,$name, $email);
            $clientRepository->createClient($client);
            break;
  
        
        
    }
}



