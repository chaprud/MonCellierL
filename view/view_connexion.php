<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($redirConnex) echo '<meta http-equiv="refresh" content="2; url=./accueil">' ?>
    <?php if ($redirCreate) echo '<meta http-equiv="refresh" content="2; url=./createUser">' ?>
    <?php if ($redirAccueil) echo '<meta http-equiv="refresh" content="2; url=./">' ?>
    <title>Connexion</title>
    <link rel="stylesheet" href="./asset/style/style_connexion.css">
</head>
<body>
    <h3> Se Connecter </h3>
    <form method="post">
        <div id="grille">
            <label for="mail_utilisateur"> e-mail </label>
            <input type="email" name="mail_utilisateur" id="mail_utilisateur" placeholder="email">
            <label for="mdp_utilisateur"> mot de passe </label>
            <input type="password" name="mdp_utilisateur" id="mdp_utilisateur" placeholder="mot de passe">
            <button type="submit" name="submit"> Se Connecter </button>
            <div class='message'><?php echo $message ?></div>
            </div>
    </form>
</body>
</html>