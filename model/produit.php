<?php
    // fonction qui crée un produit
    function createProduct($bdd, $nom, $achat, $peremption):void {
        try {
            $req = $bdd->prepare("INSERT INTO produit(nom_produit, date_achat, date_peremption) VALUES (?,?,?)");
            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->bindParam(2, $achat, PDO::PARAM_STR);
            $req->bindParam(3, $peremption, PDO::PARAM_STR);
            $req->execute();
        }
        catch (Exception $e)
        {
            //affichage d'une erreur 
            die ("erreur: " .$e->getMessage()); 
        }
    }

    // fonction qui cherche un produit par nom

    function searchProduct ($bdd, $nom):?array{
        try {
            //stocker et évaluer la requête
            $req = $bdd->prepare("SELECT id_produit, nom_produit, date_achat,
            date_peremption FROM produit WHERE nom_utilisateur = ?");
            //binder la valeur $nom au ?
            $req->bindParam(1, $nom, PDO::PARAM_STR);
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