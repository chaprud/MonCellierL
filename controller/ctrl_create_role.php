<?php
    //import des ressources dont on a besoin 
    //import connexion bdd
    include '../utils/bddConnect.php';
    //import des fonctions des roles
    include '../model/role_utilisateur.php';
    //import du corps de la page
    include '../view/view_create_role.php'; 

    //test si le bouton est cliqué
    if (isset($_POST['submit'])) {
        //test si les champs input sont remplis
        if (
            !empty($_POST['nom_role'])
            ) {
            //stocker les valeurs POST dans des variables
            $nom = $_POST['nom_role'];
            //fonction ajouter un role en BDD
            createRole($bdd, $nom);
            //message de confirmation
            $message = "le role $nom a été ajouté en BDD";
            }
            //test si un ou plusieurs champs ne sont pas remplis
            else {
            $message = "Veuillez donner un nom au rôle";
            }
        }   
    //test si le bouton n'est pas cliqué
    else {
        $message = "Pour ajouter un rôle, cliquer sur ajouter";
    }
// affichage des erreurs
echo "<div class='message'>$message</div>";
?>