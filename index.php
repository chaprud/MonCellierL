<?php
    // Import connexion BDD
    include './utils/bddConnect.php';

    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/'; 

    //routeur 
    switch ($path) {
        case '/MonCellier/':
            include './accueil.php';
            break;
        case '/MonCellier/createUser':
            include '../MonCellier/controller/ctrl_create_user.php';
            break;
        case '/MonCellier/connexion';
            include '../MonCellier/controller/ctrl_connexion.php'; 
            break; 
        case '/MonCellier/compte';
            include '../MonCellier/controller/ctrl_compte.php';
            break; 
        case '/MonCellier/modifCompte'; 
            include '../MonCellier/controller/ctrl_modif_compte.php'; 
            break; 
        case '/MonCellier/createFoyer';
            include '../MonCellier/controller/ctrl_create_foyer.php';
            break; 
        case '/MonCellier/bienvenue';
            include '../MonCellier/controller/ctrl_bienvenue.php';
            break;
        case '/MonCellier/newMdp';
            include '../MonCellier/controller/ctrl_new_mdp.php';
            break;
        default:
            include './error.php';
            break;
    }

?>