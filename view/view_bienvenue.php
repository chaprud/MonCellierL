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
    <div class="container">
        <div class="button">
            <button onclick="window.location.href='./compte';">
                <img src="./asset/images/user.png" alt="icone utilisateur" id="img1">
            </button>
        </div>
        <div class="search">
            <div id="recherche">
                <input type="search" name="recherche" placeholder="rechercher un produit">
            </div>
            <div class="button" id="bouton2">
                <button type="submit">
                    <img src="./asset/images/recherche.png" alt="icone recherche" id="img2">
                </button>
            </div>
        </div>
    </div>
    <div class="message">
        Bienvenue <?php echo $_SESSION["prenom"] ?> !
    </div>
    <div class="accueil">
            <button  class="fonctionalite" id="stock" onclick="window.location.href='/MonCellier/stock'">
                Mon Stock
            </button>
            <button  class="fonctionalite" id="liste" onclick="window.location.href='/MonCellier/liste'">
                Mes Listes
            </button>
    </div>

</body>

</html>