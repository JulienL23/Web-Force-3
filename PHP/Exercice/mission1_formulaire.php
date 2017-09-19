<?php

if(!empty($_POST)){
    echo '<h1>Informations</h1>';

    foreach($_POST as $indice => $valeur){
        if(empty($valeur) || ($valeur == '--Choix--')){
            echo '<p>Veuillez renseigner le champs ' . $indice .'</p>';
        }
        else
        {
            echo $indice . ' : <b>' . $valeur . '</b><br/>';
        }
    }
    echo "<hr/>";
}

?>
<style>
    label{
        float:left;
        width: 100px;
    }
    input{
        float:left;
        width: 150px;
    }
</style>
<h1>Mission 1 - FORMULAIRE</h1>

<form action="" method="post">
    <label>Prénom  </label>
    <input type="text" name="prenom" placeholder="mon prenom"><br><br>

    <label>Nom  </label>
    <input type="text" name="nom" placeholder="mon nom"><br><br>

    <label>Adresse  </label>
    <input type="text" name="adresse" placeholder="mon adresse"><br><br>

    <label>Ville  </label>
    <input type="text" name="ville" placeholder="ma ville"><br><br>

    <label>Code Postal  </label>
    <input type="text" name="cp" placeholder="75015"><br><br>

    <label>Sexe  </label>
    <select name="sexe">
        <option>--Choix--</option>
        <option>Homme</option>
        <option>Femme</option>
    </select><br/><br/>

    <label>Description  </label>
    <textarea name="description" rows="5" cols="22"></textarea><br><br>

    <input type="submit" value="Envoi">
</form>
