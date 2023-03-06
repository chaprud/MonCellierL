<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes foyers</title>
</head>
<body>
<h3>Créer un foyer</h3>
        <div class="form">
            <form method="post" enctype="multipart/form-data" id="myForm">
                <div id=grille>
                    <label for="nom_foyer" class="label"> Nom du foyer </label>
                    <input type="text" id="nom_foyer" name="nom_foyer" size="50" placeholder="nom" class="input">
                    <button type="submit" name="submit" id="valider"> Créer mon foyer </button>
                </div>
                <div class='message'><?php echo $message ?></div>
            </form>
        </div>
</body>
</html>