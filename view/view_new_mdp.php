<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./asset/style/style_new_mdp.css">
    <script src="./asset/script/script_new_mdp.js" defer></script>
    <?php if ($redirConnex) echo '<meta http-equiv="refresh" content="1; url=./connexion">' ?>
    <?php if ($redirCreate) echo '<meta http-equiv="refresh" content="2; url=./createUser">' ?>
</head>

<body>
    <h3> Choisissez un nouveau mot de passe </h3>
    <form id="newMdp" method="post">
        <div id="grille">
            <label for="mail_utilisateur" class="label"> Mon e-mail</label>
            <input type="email" name="mail_utilisateur" id="mail_utilisateur" placeholder="e-mail">
            <label for="mdp_utilisateur" class="label"> Mot de passe</label>
            <input type="password" id="mdp_utilisateur" name="mdp_utilisateur" placeholder="mot de passe" class="input">
            <div id="error_mdp" class="error"> <?php echo $message ?> </div>
            <button type="submit" name="submit" id="valider"> Modifier</button>
        </div>
    </form>
</body>

</html>