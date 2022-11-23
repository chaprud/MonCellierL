<?php

// fonction qui crée un foyer
    function createFoyer($bdd, $nom):void {
        try {
            $req = $bdd->prepare("INSERT INTO foyer(nom_foyer) VALUES (?)");
            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->execute();
        }
        catch (Exception $e)
        {
            //affichage d'une erreur 
            die ("erreur: " .$e->getMessage()); 
        }
    }
?>
