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
            mail_utilisateur, mdp_utilisateur FROM utilisateur WHERE mail_utilisateur = ?");
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

    //fonction qui modifie le mot de passe

    function updatePassword ($bdd, $mdp):void {
        try {
            //stocker la requête
            $req=$bdd->prepare("UPDATE utilisateur SET mdp_utilisateur=?");
            //Binder les valeurs aux ?
            $req->bindParam(1, $mdp, PDO::PARAM_STR);
            $req->execute();
        }
        catch (Exception $e)
        {
            //affichage d'une exception en cas d'erreur
            die("Erreur:" .$e->getMessage()); 
        } 
    }

     // fonction qui recherche un utilisateur par id

    function searchId ($bdd, $id):?array{
        try {
            //stocker et évaluer la requête
            $req = $bdd->prepare("SELECT id_utilisateur, nom_utilisateur, prenom_utilisateur,
            mail_utilisateur, utilisateur.id_type_utilisateur, nom_type_utilisateur FROM utilisateur  
            INNER JOIN type_utilisateur ON utilisateur.id_type_utilisateur=type_utilisateur.id_type_utilisateur
            WHERE id_utilisateur = ?");
            //binder la valeur $id au ?
            $req->bindParam(1, $id, PDO::PARAM_STR);
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

    // fonction qui affiche les foyers d'un utilisateur 
    
    function foyerUtil ($bdd, $id):?array{
        try{
            //stocker et evaluer la requête
            $req = $bdd->prepare("SELECT nom_foyer 
            FROM ((foyer 
            INNER JOIN appartenir ON appartenir.id_foyer = foyer.id_foyer)
            INNER JOIN utilisateur ON appartenir.id_utilisateur = utilisateur.id_utilisateur)
            WHERE utilisateur.id_utilisateur = ?"); 
            // binder la valeur $id au ?
            $req->bindParam(1, $id, PDO::PARAM_STR); 
            //executer la requête
            $req->execute(); 
            //stocker dans $data le résultat de la requête 
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            // retourner le résultat
            return $data; 
        }
        catch (Exception $e)
        {
            //affichage d'une erreur
            die("erreur:".$e->getMessage()); 
        }
    }

    // fonction qui met à jour le type d'utilisateur

    function updateId ($bdd, $id):void {
        try {
            $req = $bdd->prepare("UPDATE utilisateur SET id_type_utilisateur = 1 WHERE id_utilisateur=?");
            $req->execute();  
        }
        catch (Exception $e) {
            die("erreur:" .$e->getMessage()); 
        }
    }
    
?>