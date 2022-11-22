<?php
    // Import connexion BDD
    include './utils/bddConnect.php';
    // Import des fonctions de l'utilisateur
    include './model/utilisateur.php';

    //test si le bouton est cliqué 
    if(isset($_POST["submit"])) {
        $mail = $_POST["mail_utilisateur"]; 
        $liste = searchMail($bdd, $mail);
        print_r($liste);
    }
    else {
        echo "il n'y a pas d'utilisateurs";
    }
    include './view/view_connexion.php';
?> 