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
?>
