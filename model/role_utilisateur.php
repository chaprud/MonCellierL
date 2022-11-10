<?php
    // fonction qui crée un role utilisateur

    function createRole($bdd, $nom):void {
        try {
            $req = $bdd->prepare("INSERT INTO role_utilisateur(nom_role) VALUES (?)");
            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->execute();
        }
        catch (Exception $e)
        {
            //affichage de l'erreur
            die("erreur:" .$e->getMessage());
        }
    }

?>