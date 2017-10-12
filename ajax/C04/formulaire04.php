<?php
    require_once("init.inc.php");
    $result = $pdo -> query("SELECT * FROM employes");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="ajax04.js"></script>
    </head>
    <body>

        <form action="#" method="post">
        <div id="resultat">

        <?php

        echo '<select name="personne" id="personne">';
        while($employe = $result -> fetch(PDO::FETCH_ASSOC)){

            echo "<option value='$employe[id_employes]'>$employe[prenom]</option>";
        }
        echo '</select>';

        ?>
        
        </div>
        <input type="submit" value="supprimer" id="submit">
        </form>

    </body>
</html>
