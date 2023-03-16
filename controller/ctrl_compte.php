<?php
    // import de la bdd
    include "./utils/bddConnect.php"; 
    // import du header
    include "./view/view_header.php"; 
    // import des fonctions utilisateurs
    include "./model/utilisateur.php"; 

    //affichage des informations du compte

    $utilisateur = searchId($bdd, $_SESSION["id"]);
    $prenom = $utilisateur[0]["prenom_utilisateur"];
    $nom = $utilisateur[0]["nom_utilisateur"]; 
    $mail = $utilisateur[0]["mail_utilisateur"];  
    $type = $utilisateur[0]["nom_type_utilisateur"];
    $id = $utilisateur[0]["id_utilisateur"]; 
    
    //import de la page
    include "./view/view_compte.php";
