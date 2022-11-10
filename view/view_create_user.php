<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un utilisateur</title>
    <link rel="stylesheet" href="./asset/style/style_create_user.css">
    <script src="./asset/script/script_create_user.js" defer></script>
</head>

<body>
    <div>
        <h3>Créer un compte</h3>
        <div class="form">
            <form method="post" enctype="multipart/form-data" id="myForm">
                <div id=grille>
                    <label for="nom_utilisateur"> Nom :</label>
                    <input type="text" id="nom_utilisateur" name="nom_utilisateur" size="50" placeholder="nom">
                    <div id="error_nom"></div>
                    <label for="prenom_utilisateur"> Prénom :</label>
                    <input type="text" id="prenom_utilisateur" name="prenom_utilisateur" size="50" placeholder="prénom">
                    <div id="error_prenom"></div>
                    <label for="mail_utilisateur"> Mail :</label>
                    <input type="email" id="mail_utilisateur" name="mail_utilisateur" size="50" placeholder="e-mail">
                    <div id="error_mail"></div>
                    <label for="mdp_utilisateur"> Mot de passe:</label>
                    <input type="password" id="mdp_utilisateur" name="mdp_utilisateur" placeholder="mot de passe">
                    <div id="error_mdp"></div>
                    <button type="submit" name="submit" id="valider"> Ajouter </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>