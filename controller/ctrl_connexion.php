<?php
    // Import des ressources 
    include './model/utilisateur.php';
    include './view/view_connexion.php';
    
    //test si le bouton cliqué
    if(isset($_POST['submit'])){
        //test si les champs sont remplis
        if(!empty($_POST['mail_utilisateur']) AND  !empty($_POST['mdp_util'])){
            //stocker les valeurs et les nettoyer
            $mail = $_POST['mail_utilisateur'];
            $password = $_POST['mdp_utilisateur'];
            //récupérer si l'utilisateur existe
            $exist = searchMailUtil($bdd, $mail);
            //tester si l'utilisateur existe
            if(!empty($exist)){
                //stocker le hash du mot de passe (depuis la bdd)
                $hash = $exist[0]['password_util'];
                //tester si le mot de passe correspond
                if(password_verify($password, $hash)){
                    //stocker les informations dans session
                    $_SESSION['connected'] = true;
                    $_SESSION['mail'] = $exist[0]['mail_utilisateur'];
                    $_SESSION['nom'] = $exist[0]['nom_utilisateur'];
                    $_SESSION['prenom'] = $exist[0]['prenom_utilisateur'];
                    $_SESSION['id'] = $exist[0]['id_utilisateur'];
                    //redirection vers la page d'accueil si connecté 
                    header('Location: ./bienvenue');
                    }
                    //test si le mot de passe n'est pas correct
                    else{
                        $message = "Les informations ne sont pas valides";
                    }
                }
            }
            //test si l'utilisateur n'existe pas
            else{
                $message = "Les informations ne sont pas valides";
            }
        }
    //test si l'utilisateur
    else{
        $message = "Pour se connecter cliquez sur connexion";
    }
    echo $message;
?> 