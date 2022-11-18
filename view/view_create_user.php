<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($redirection) echo '<meta http-equiv="refresh" content="3; url=./connexion">' ?>
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
                    <label for="nom_utilisateur" class="label"> Nom :</label>
                    <input type="text" id="nom_utilisateur" name="nom_utilisateur" size="50" placeholder="nom" class="input">
                    <div id="error_nom" class="error"></div>
                    <label for="prenom_utilisateur" class="label"> Prénom :</label>
                    <input type="text" id="prenom_utilisateur" name="prenom_utilisateur" size="50" placeholder="prénom" class="input">
                    <div id="error_prenom" class="error"></div>
                    <label for="mail_utilisateur" class="label"> Mail :</label>
                    <input type="email" id="mail_utilisateur" name="mail_utilisateur" size="50" placeholder="e-mail" class="input">
                    <div id="error_mail" class="error"></div>
                    <label for="mdp_utilisateur" class="label"> Mot de passe:</label>
                    <input type="password" id="mdp_utilisateur" name="mdp_utilisateur" placeholder="mot de passe" class="input">
                    <div id="error_mdp" class="error"></div>
                    <button type="submit" name="submit" id="valider"> Créer mon compte </button>
                </div>
                <div class='message'><?php echo $message ?></div>
            </form>
        </div>
    </div>
    
</body>

</html>