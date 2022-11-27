<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur Mon Cellier</title>
    <link rel="stylesheet" href="./asset/style/style_bienvenue.css">
</head>

<body>
    <div id="container">
        <div id="compte">
            <button id="bouton1" onclick="window.location.href='./MonCellier/compte';"> 
                <img src="./asset/images/user.png" alt="icone utilisateur" id="img1">
                <p>Mon Compte</p> 
            </button>
            <input type="search" name="recherche" id="recherche">
            <button type="submit"> 
                <img src="./asset/images/recherche.png" alt="icone recherche" id="img2">
            </button>
        </div>
        <div id="produit">
            <img src="./asset/images/Produits.png" alt="icone produits">
            <p> Mon Stock </p>
        </div>
        <div id="liste">
            <img src="./asset/images/liste.png" alt="icone listes">
            <p> Mes Listes </p>
        </div>
    </div>
</body>

</html>