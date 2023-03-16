<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/style/style_compte.css">
    <title>Mon Compte</title>
</head>
<body>
    <h3> Mon Compte </h3>
    <div id="prenom" class="info1"> Prénom </div>
    <div class="info2"> <?php echo $prenom ?></div>
    <div id="nom" class="info1"> Nom </div>
    <div class="info2"> <?php echo $nom ?></div>
    <div id="mail" class="info1"> Mail </div>
    <div class="info2"><?php echo $mail ?></div>
    <div id="type" class="info1"> Type utilisateur </div>
    <div class="info2"><?php echo $type ?></div>
    <div id="foyer" class="info1"> Foyer(s) </div>
    <div class="info2"><?php 
        $foyerUtil = foyerUtil($bdd, $id);
        if (empty($foyerUtil)) {
            $foyer = "aucun foyer n'a été créé";
            }
        else {
            foreach($foyerUtil as $value) {
            echo "<p> {$value["nom_foyer"]} </p>"; 
            }   
        } 
        ?></div>
    <div class="bouton">
        <div class="button">
            <button  onclick="window.location.href='./modifCompte';"> Modifier mes informations </button>
        </div>
        <div class="button">
            <button  onclick="window.location.href='./createFoyer';"> Foyer(s) </button>
        </div>
    </div>
</body>
</html>