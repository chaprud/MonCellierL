
<?php

// Import connexion BDD
include './utils/bddConnect.php';
// Import des fonctions de l'utilisateur
include './model/utilisateur.php';
//import de l'entête
include './view/view_header.php'; 

    $redirConnex=false; 
    $redirCreate=false;
    $message = "";

//test si le bouton est cliqué 
if (isset($_POST["submit"])) {
    //test si les champs sont remplis
    if (!empty($_POST["mail_utilisateur"]) && !empty($_POST["mdp_utilisateur"])) {
        //stockage des valeurs
        $mail = $_POST["mail_utilisateur"];
        $mdp = $_POST["mdp_utilisateur"];
        //Vérifier si l'utilisateur existe
        $utilisateur = searchMail($bdd, $mail);
        // Si l'utilisateur existe
        if (!empty($utilisateur)) {
            //cryptage du mot de passe 
            $mdp = password_hash($_POST['mdp_utilisateur'], PASSWORD_DEFAULT);
            //enregistrement du nouveau mot de passe
            updatePassword($bdd, $mdp);
            //message de confirmation
            $message = "votre mot de passe a été modifié";
            $redirConnex = true;
        } else {
            $message = "Votre compte n'existe pas, veuillez le créer";
            $redirCreate = true;
        }
    } else {
        $message = "veuillez cliquer sur Se connecter";
    }
}

//import vue de la page
include './view/view_new_mdp.php'; 

?>