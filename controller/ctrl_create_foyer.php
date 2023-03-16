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
            $message =""; 
            // création du foyer avec l'utilisateur en gestionnaire
                //test si le champ est rempli
                if (!empty($_POST["nom_foyer"])) {
                    $nomFoyer = cleanInput($_POST["nom_foyer"]); 
                    // test si le nom existe
                    $foyerExist = searchFoyer($bdd,$nomFoyer); 
                    if (empty($foyerExist)) {
                        createFoyer($bdd, $nomFoyer, $idGest); 
                        $message = "le foyer $nomFoyer a été créé avec $prenom $nom en gestionnaire principal"; 
                        $foyer2 = searchFoyer($bdd, $nomFoyer); 
                        $idFoyer = $foyer2[0]["id_foyer"];
                        appartenir($bdd, $id, $idFoyer); 
                    }
                    else {
                        $message = "le foyer existe déjà"; 
                    }
                    
                }
                else {
                    $message = "le foyer n'a pas été créé."; 
                }
        }
        else {
            $message =""; 
        }

    // Import du corps de la page
    include './view/view_create_foyer.php'; 

?>