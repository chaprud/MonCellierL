<?php

// fonction qui crée un foyer
    function createFoyer($bdd, $nomFoyer, $idGest):void {
        try {
            $req = $bdd->prepare("INSERT INTO foyer(nom_foyer, id_gestionnaire) VALUES (?,?)");
            $req->bindParam(1, $nomFoyer, PDO::PARAM_STR);
            $req->bindParam(2, $idGest, PDO::PARAM_STR); 
            $req->execute();
        }
        catch (Exception $e)
        {
            //affichage d'une erreur 
            die ("erreur: " .$e->getMessage()); 
        }
    }

// fonction qui associe foyer et utilisateur
    function appartenir($bdd, $id, $foyer):void {
        try {
            $req = $bdd->prepare("INSERT INTO appartenir(id_utilisateur, id_foyer) VALUES (?,?)"); 
            $req->bindParam(1, $id, PDO::PARAM_STR); 
            $req->bindParam(2, $foyer, PDO::PARAM_STR); 
            $req->execute();
        }
        catch (Exception $e)
        {
            die ("erreur:" .$e->getMessage()); 
        }
    }

// fonction qui recherche un foyer par id
    function searchFoyer($bdd, $idFoyer): ?array
        {
            try {
                //stocker et évaluer la requête
                $req = $bdd->prepare("SELECT id_foyer FROM foyer WHERE id_gestionnaire = ?");
                //binder la valeur $id au ?
                $req->bindParam(1, $idFoyer, PDO::PARAM_STR);
                //exécuter la requête
                $req->execute();
                //stocker dans $data le résultat de la requête (tableau associatif)
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                //retourner le tableau associatif
                return $data;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
?>
