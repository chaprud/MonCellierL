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

    function listeUtils($bdd):?array {
        try {
            $req = $bdd->prepare("SELECT id_utilisateur, nom_utilisateur, prenom_utilisateur, mail_utilisateur FROM utilisateur");
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

    function searchMail ($bdd, $mail):?array{
        try {
            //stocker et évaluer la requête
            $req = $bdd->prepare("SELECT id_utilisateur, nom_utilisateur, prenom_utilisateur,
            mail_utilisateur FROM utilisateur WHERE mail_utilisateur = ?");
            //binder la valeur $mail au ?
            $req->bindParam(1, $mail, PDO::PARAM_STR);
            //exécuter la requête
            $req->execute();
            //stocker dans $data le résultat de la requête (tableau associatif)
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            //retourner le tableau associatif
            return $data;
        } 
        catch (Exception $e) 
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
?>