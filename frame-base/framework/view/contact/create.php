<?php

 ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Créer un contact</title>
    </head>
    <body>
        <form action="/contact/store" method="post">
            <input type="text" name="nom" placeholder="Prénom"><br>
            <input type="text" name="prenom" placeholder="Nom"><br>
            <input type="text" name="phone" placeholder="Téléphone"><br>
            <input type="submit" value="Envoyer">
        </form>
    </body>
</html>
