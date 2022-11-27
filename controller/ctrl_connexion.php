<?php
    // Import connexion BDD
    include './utils/bddConnect.php';
    // Import des fonctions de l'utilisateur
    include './model/utilisateur.php'; 
    // Import header
    include './view/view_header.php'; 

    $redirConnex = false; 
    $redirCreate = false; 
    $redirAccueil = false;

    $message = ""; 

    //test si le bouton est cliqué 
    if(isset($_POST["submit"])) {
        //test si les champs sont remplis
        if (!empty($_POST["mail_utilisateur"]) && !empty($_POST["mdp_utilisateur"])) {
            //stockage des valeurs
            $mail = $_POST["mail_utilisateur"]; 
            $mdp = $_POST["mdp_utilisateur"]; 
            //Vérifier si l'utilisateur existe
            $utilisateur = searchMail($bdd, $mail); 
            // Si l'utilisateur existe
            if (!empty($utilisateur)) {
                //vérification du hash du mot de passe
                $hash = $utilisateur[0]["mdp_utilisateur"]; 
                if(password_verify($mdp, $hash)) {
                    //stockage des informations dans la session
                    $_SESSION["connected"] = true;
                    $_SESSION["id"] = $utilisateur[0]["id_utilisateur"];
                    $_SESSION["mail"] = $utilisateur[0]["mail_utilisateur"]; 
                    $_SESSION["nom"] = $utilisateur[0]["nom_utilisateur"];
                    $_SESSION["prenom"] = $utilisateur[0]["prenom_utilisateur"];
                    $redirConnex=true; 
                }
                else {
                    $message = "Les informations ne sont pas valides"; 
                }
            }
            else {
                $message = "Veuillez créer un compte"; 
                $redirCreate = true; 
            }
        } else {
            $message = "veuillez cliquer sur Se connecter"; 
            $redirAccueil = true; 
        }
    }
    //import de la page 
    include './view/view_connexion.php';
?> 