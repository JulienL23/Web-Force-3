<?php

echo '<pre>';
print_r($_POST);
echo '</pre>';

// faire la connection avec la base de données



// faire en sorte que le formulaire envoi les informations


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Informations</h2>
        <form class="form" name= "formulaire" method="post">
            <label>Nom *</label><br/>
            <input type="text" name="nom" ><br/><br/>

            <label>Préom *</label><br/>
            <input type="text" name="prenom" ><br/><br/>

            <label>Téléphone *</label><br/>
            <input type="text" name="telephone" maxlength="10"><br/><br/>

            <label>Profession</label><br/>
            <input type="text" name="telephone" ><br/><br/>

            <label>Ville</label><br/>
            <input type="text" name="ville" ><br/><br/>

            <label>Code Postal</label><br/>
            <input type="text" name="cp" ><br/><br/>

            <label>Adresse</label><br/>
            <textarea name="adresse" rows="8" cols="15"></textarea><br/><br/>

            <label>Date de Naissance</label><br/>
            <select name="date_de_naissance"></select><br/><br/>

            <label>Sexe</label><br/>
            <label>Homme</label>
            <input type="checkbox" name="sexe" value="homme">
            <label>Femme</label>
            <input type="checkbox" name="sexe" value="femme"><br/><br/>

            <input type="submit" value="enregistrement">

        </form>
    </div>
</body>
</html>
