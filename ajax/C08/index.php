<?php
    require_once("init.inc.php");

    $resultat = $pdo -> query("SELECT * FROM employes");
    $employes = $resultat -> fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="ajax08.js"></script>
    </head>
    <body>
        <!-- Réaliser une liste déroulante permettant de selectionner un employe de l'entreprise -->

        <form action="#" method="post">
            <fieldset style="width:0;">
                <legend>Employes</legend>
                <select id="personne" name="prenom">
                    <?php foreach ($employes as $value) {
                        echo '<option>' . $value['prenom'] . '</option>';
                    } ?>
                </select>
                <input type="submit" value="ok" id="submit">
            </fieldset>
        </form>
        <div id="resultat"></div>

    </body>
</html>
