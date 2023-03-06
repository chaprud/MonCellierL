<?php

// fonction qui crée un gestionnaire principal

    function createGest ($bdd, $nom, $prenom, $mail):void {
        try {
            $req = $bdd->prepare("INSERT INTO gestionnaire_principal(nom_gestionnaire, prenom_gestionnaire, mail_gestionnaire) VALUES (?,?,?)");
            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->bindParam(2, $prenom, PDO::PARAM_STR);
            $req->bindParam(3, $mail, PDO::PARAM_STR); 
            $req->execute();
        } catch (Exception $e) {
            //affichage d'une erreur 
            die("erreur: " . $e->getMessage());
        }
    }

// fonction qui cherche un gestionnaire par son mail

    function searchGestMail ($bdd, $mail):?array {
        try {
            //stocker et évaluer la requête
            $req = $bdd->prepare("SELECT id_gestionnaire FROM gestionnaire_principal 
            WHERE mail_gestionnaire = ?");
            //binder la valeur $id au ?
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