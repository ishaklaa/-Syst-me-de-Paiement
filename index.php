<?php
include_once "Repository\ClientRepository.php";
include_once "Repository\CommandeRepository.php";
include_once "Repository\PaiementRepository.php";
$clientRepository = new ClientRepository();
$commandRepository = new CommandeRepository();
$paiementRepository = new PaiementRepository();
while (true) {
    $choix = readline("1- créér un compte: \n2- afficher tout les comptes: \n3- faire une commande: \n4- afficher tout les commandes: \n5-creer un paiement: \n6- afficher les paiements \n");

    switch ($choix) {

        case 1:
            $name = readline("entrer le nom :");
            $email = readline("entrer le email :");
            $client = new client($id, $name, $email);
            $clientRepository->createClient($client);
            break;

        case 2:

            $clients = $clientRepository->getAllClients();
            foreach ($clients as $cl) {
                $name = $cl->getName();
                $email = $cl->getEmail();
                $id = $cl->getId();
                echo "id: " . $id .  "\nname :" . $name . "\nemail : " . $email . "\n\n";
            }
            break;
        case 3:
            $clients = $clientRepository->getAllClients();
            foreach ($clients as $cl) {
                $name = $cl->getName();
                $email = $cl->getEmail();
                $id = $cl->getId();
                echo "id: " . $id .  "\nname :" . $name . "\nemail : " . $email . "\n\n";
            }

            $client_id = readline("entrer le id du client:");
            $montant = readline("entrer le montant :");
            $status = readline("1-- en attente: \n2-- en cours de livraison: \n3-- livré:\n");
            if ($status == 1) {
                $statut = "en attente";
                $commande = new commande($id, $montant, $statut, $client_id);
                $commandRepository->createCommande($commande);
            } else if ($status == 2) {
                $statut = "en cours de livraison";
                $commande = new commande($id, $montant, $statut, $client_id);
                $commandRepository->createCommande($commande);
            } else if ($status == 3) {
                $statut = "livré";
                $commande = new commande($id, $montant, $statut, $client_id);
                $commandRepository->createCommande($commande);
            }



            break;
        case 4:
            $commandes = $commandRepository->getAllCommandes();
            foreach ($commandes as $cmd) {
                $statut = $cmd->getStatut();
                $montant = $cmd->getMontant();
                $id = $cmd->getId();
                $clinet_id = $cmd->getClient_id();
                echo "id: " . $id .  "\nmontant totale: " . $montant . "\nstatut : " . $statut . "\nid du client: " . $clinet_id . "\n\n";
            }
            break;
        case 5:
            $commandes = $commandRepository->getAllCommandes();
            foreach ($commandes as $cmd) {
                $statut = $cmd->getStatut();
                $montant = $cmd->getMontant();
                $id = $cmd->getId();
                $clinet_id = $cmd->getClient_id();
                echo "id: " . $id .  "\nmontant totale: " . $montant . "\nstatut : " . $statut . "\nid du client: " . $clinet_id . "\n\n";
            }
            $commande_id = readline("entrer l'id du commande: ");
            $montant = $paiementRepository->getCommandeMontant($commande_id);
            $status = readline("1- payé \n2- non non rémunéré \n");

            $statut;

            if ($status == 1) {
                $statut = "payé";
            } else if ($status == 2) {
                $statut = "non rémunéré";
            }
            $type;
            $types = readline("1- paypal \n2- carte bancaire \n3- virement \n");
            if ($types == 1) {
                $type = "paypal";
            } else if ($types == 2) {
                $type = "carte bancaire";
            } else if ($types == 3) {
                $type = "virement";
            }

            $paiement = new paiement($id, $montant, $statut, $type, $date_paie, $commande_id);
            $paiementRepository->createPaiement($paiement);
            break;
        case 6:
            $paiements = $paiementRepository->getAllpaiemments();
            foreach ($paiements as $pmt) {
                $statut = $pmt->getStatut();
                $montant = $pmt->getMontant();
                $id = $pmt->getId();
                $type = $pmt->getType();
                $Commande_id = $pmt->getCommande_id();
                $Date_paie = $pmt->getDate_paie();
                echo "id: " . $id .  "\nmontant totale : " . $montant . "\nstatut : " . $statut . "\ntype du paiement : " . $type . "\nCommande_id : " . $Commande_id . "\ndate de paiement : " . $Date_paie . "\n\n";
            }
            break;
    }
}
