<?php
    // fonction qui crée un utilisateur

    function createUtil($bdd, $nom, $prenom, $mail, $mdp):void {
        try {
            $req = $bdd->prepare("INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, mdp_utilisateur) VALUES (?,?,?,?)");
            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->bindParam(2, $prenom, PDO::PARAM_STR);
            $req->bindParam(3, $mail, PDO::PARAM_STR);
            $req->bindParam(4, $mdp, PDO::PARAM_STR);
            $req->execute();
        }
        catch (Exception $e)
        {
            //affichage d'une erreur 
            die ("erreur: " .$e->getMessage()); 
        }
    }

    // fonction qui affiche la liste des utilisateurs

    function listUtil($bdd):?array {
        try {
            $req = $bdd->prepare("SELECT id_utilisateur, pseudo_utilisateur FROM utilisateur ORDER BY pseudo_utilisateur ASC "); 
            $req->execute(); 
            // stocker le résultat dans une variable
            $liste=$req->fetchAll(PDO::FETCH_ASSOC);
            // retourner la liste
            return $liste; 
        }
        catch (Exception $e)
        {
            //affichage d'une erreur 
            die ("erreur: " .$e->getMessage()); 
        }
    }

    // fonction qui recherche un utilisateur par son pseudo

    function searchUtil($bdd, $pseudo):?array {
        try {
            $req = $bdd->prepare("SELECT id_utilisateur, pseudo_utilisateur FROM utilisateur WHERE pseudo_utilisateur=?");
            $req->bindParam(1, $pseudo, PDO::PARAM_STR); 
            $req->execute();
            //synthetiser le résultat dans un tableau
            $utilisateur = $req->fetchAll(PDO::FETCH_ASSOC); 
            // retourner le résultat
            return $utilisateur; 

        }
        catch (Exception $e)
        {
            //affichage d'une erreur 
            die ("erreur: " .$e->getMessage()); 
        }
    }

    // fonction qui recherche un utilisateur par mail 

    function searchMailUtil($bdd, $mail):?array {
        try {
            $req = $bdd->prepare("SELECT id_utilisateur, mail_utilisateur FROM utilisateur WHERE mail_utilisateur=?");
            $req->bindParam(1, $mail, PDO::PARAM_STR); 
            $req->execute();
            //synthetiser le résultat dans un tableau
            $utilisateur = $req->fetchAll(PDO::FETCH_ASSOC); 
            // retourner le résultat
            return $utilisateur; 

        }
        catch (Exception $e)
        {
            //affichage d'une erreur 
            die ("erreur: " .$e->getMessage()); 
        }
    }
?>