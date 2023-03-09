<?php

    // Import des fonctions de l'utilisateur, du gestionnaire et du foyer
    include './model/utilisateur.php';
    include './model/foyer.php'; 
    include './model/gestionnaire.php'; 

    // Récupération des informations de la personne connectée

    $utilisateur = searchId($bdd, $_SESSION["id"]); 
    $id = $utilisateur[0]["id_utilisateur"]; 
    $prenom = $utilisateur[0]["prenom_utilisateur"];
    $nom = $utilisateur[0]["nom_utilisateur"]; 
    $mail = $utilisateur[0]["mail_utilisateur"]; 

    // Création du gestionnaire principal
        // test du bouton cliqué 
        if(isset($_POST["submit"])) {
            //recherche l'id du gestionnaire
            $gest = searchGestMail($bdd, $mail); 
            $idGest = $gest[0]["id_gestionnaire"]; 
            // création du foyer avec l'utilisateur en gestionnaire
                //test si le champ est rempli
                if (!empty($_POST["nom_foyer"])) {
                    $nomFoyer = cleanInput($_POST["nom_foyer"]); 
                    createFoyer($bdd, $nomFoyer, $idGest); 
                    $message = "le foyer $nomFoyer a été créé avec $prenom $nom en gestionnaire principal"; 
                }
                else {
                    $message = "le foyer n'a pas été créé."; 
                }
            //association du foyer et de l'utilisateur

            //foyer[0] pose pb 
            $foyer = searchFoyer($bdd, $idGest); 
            $lienFoyer = $foyer[0]["id_foyer"];  
            appartenir($bdd, $id, $lienFoyer);


        }
        else {
            $message =""; 
        }

    // Import du corps de la page
    include './view/view_create_foyer.php'; 

?>