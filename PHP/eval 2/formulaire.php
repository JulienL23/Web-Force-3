<?php

if(!empty($_POST)){

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
</head>
<body>
    <div class="container">
        <fieldset  style="width:223px">
            <legend>Informations</legend>
        <form class="form" name= "formulaire" method="post">
            <label>Nom *</label><br/>
            <input type="text" name="nom" ><br/><br/>

            <label>Préom *</label><br/>
            <input type="text" name="prenom" ><br/><br/>

            <label>Téléphone *</label><br/>
            <input type="text" name="telephone" maxlength="10"><br/><br/>

            <label>Profession</label><br/>
            <input type="text" name="profession" ><br/><br/>

            <label>Ville</label><br/>
            <input type="text" name="ville" ><br/><br/>

            <label>Code Postal</label><br/>
            <input type="text" name="cp" ><br/><br/>

            <label>Adresse</label><br/>
            <textarea name="adresse" rows="8" cols="15"></textarea><br/><br/>

            <label>Date de Naissance</label><br/>
            <!------------JOUR---------------->
            <select name="jour">
				<?php
				for($i = 1; $i <= 31; $i++){
					echo '<option>' . substr('0'.$i, -2) . '</option>';
				}
				?>
			</select>
            <!-------------MOIS-------------->
			<select name="mois">
				<option>Janvier</option>
				<option>Février</option>
				<option>Mars</option>
				<option>Avril</option>
				<option>Mai</option>
				<option>Juin</option>
				<option>Juillet</option>
				<option>Aout</option>
				<option>Septembre</option>
				<option>Octobre</option>
				<option>Novembre</option>
				<option>Decembre</option>
			</select>
            <!-----------ANNEE-------------->
			<select name="annee">
				<?php
					$i = date('Y') - 15;
					while($i >= 1900 ){
						echo '<option>' . $i . '</option>';
						$i --;
					}
				?>
			</select><br/><br/>

            <label>Sexe</label><br/>
            <label name="homme">Homme</label>
            <input type="checkbox" name="sexe" value="homme" checked>
            <label name="femme">Femme</label>
            <input type="checkbox" name="sexe" value="femme"><br/><br/>

            <input type="submit" value="enregistrement">
            </fieldset>
        </form>
    </div>
</body>
</html>
