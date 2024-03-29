<?php

// Import des fonctions de l'utilisateur
include './model/utilisateur.php';
include "./model/gestionnaire.php"; 

$redirection = false;

//test si le bouton est cliqué
if (isset($_POST['submit'])) {
    //test si les champs input sont remplis
    if (
        !empty($_POST['nom_utilisateur']) and !empty($_POST['prenom_utilisateur']) and
        !empty($_POST['mail_utilisateur']) and !empty($_POST['mdp_utilisateur'])
    ) {
        //stocker les valeurs POST dans des variables
        $nom = cleanInput($_POST['nom_utilisateur']);
        $prenom = cleanInput($_POST['prenom_utilisateur']);
        $mail = cleanInput($_POST['mail_utilisateur']);
        $idTypeUtil = 1; 
        //récupération du compte si il existe
        $exist = searchMail($bdd, $mail);
        //test si le compte existe
        if (empty($exist)) {
            //mot de passe crypté
            $mdp = password_hash($_POST['mdp_utilisateur'], PASSWORD_DEFAULT);
            //fonction ajouter un utilisateur en BDD
            createUtil($bdd, $nom, $prenom, $mail, $mdp, $idTypeUtil);
            //message de confirmation
            $message = "le compte $prenom $nom a été créé, vous allez être redirigé vers la page de connexion dans quelques secondes";
            $redirection = true;
        }
        //test sinon le compte existe
        else {
            $message = "le compte existe déja";
            $redirection = true;
        } 
        // insertion dans la table gestionnaire principal
        createGest($bdd, $nom, $prenom, $mail);          
    }
    //test si un ou plusieurs champs ne sont pas remplis
    else {
        $message = "Veuillez remplir les champs du formulaire";
    }
}
//test si le bouton n'est pas cliqué
else {
    $message = "";
}

// Import du corps de la page 
include './view/view_create_user.php';

?>