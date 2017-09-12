<?php
//démarrage de la Session
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h2>Nouveau contact</h2>
        <!--method GET(action visible dans l'url) ou POST-->
        <form method="post" action="libs/contactManager.php?action=new">
            <label>Nom</label><br />
            <input type="text" id="nomEmploye" name="nomEmploye"><br />
            <label>Prenom</label><br />
            <input type="text" id="prenomEmploye" name="prenomEmploye"><br />
            <label>Genre</label><br />
            <select name="hommeFemme">
                <option value="0">-- Choisir --</option>
                <option value="1">Homme</option>
                <option value="2">Femme</option>
            </select><br />
            <input type="submit" value="Ajouter">
            <?php
                if (isset($_SESSION['error'])){
                    echo "<strong>".$_SESSION['error']."</strong>";
                    // on supprime l'erreur
                    unset($_SESSION['error']);
                }
                //si on a un message en session, on l'afficher
                if(isset($_SESSION['message'])){
                    echo "<strong>".$_SESSION['message']."</strong>";
                    // on supprime le message
                    unset($_SESSION['message']);
                }
            ?>
        </form>
    </body>
</html>
