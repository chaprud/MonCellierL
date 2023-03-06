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

    $foyerUtil = foyerUtil($bdd, $mail);
    var_dump($foyerUtil); 
    // retourne un résultat vide, il faudra remplir la table d'association. 
    if (isset($foyerUtil)) {
        $foyer = $foyerUtil[0]["nom_foyer"]; 
    }
    else {
        $foyer = "Aucun foyer n'a été créé"; 
    }
    //import de la page
    include "./view/view_compte.php"; 


?>