<?php
if(!empty($_POST)){
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    foreach($_POST as $indice => $valeur){
        if(empty($valeur)){
            echo '<p style="background:red; color:white; padding : 5px;">Veuillez renseigner le champs ' . $indice .'</p>';
        }
        else
        {
            echo $indice . ' : <b>' . $valeur . '</b><br/>';
        }
    }


    echo "<br><hr>";


    echo "Adresse saisie : <br/>";
    echo "Adresse : " . $_POST['adresse'] . '<br/>';
    echo "Code Postal : " . $_POST['cp'] . '<br/>';
    echo "Ville : " . $_POST['ville'] . '<br/>';

}
?>
<h1>Formulaire 2</h1>

<form method="post" action="">
    <label>Ville : </label><br/>
    <input type="text" name="ville"><br/><br/>

    <label>Code postal : </label><br/>
    <input type="text" name="cp"><br/><br/>

    <label>Adresse : </label><br/>
    <textarea rows="3" cols="22" name="adresse"></textarea><br/><br/>

    <input type="submit" value="Valider">
</form>
