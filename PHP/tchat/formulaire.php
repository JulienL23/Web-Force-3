<?php

/*
Objectif : enregistrer des utilisateurs dans la table membre :

1/Formulaire (pseudo, mdp, email)

2/Enregistrer les infos en BDD :
    - id_membre : auto increment
    - photo : default.jpg
    - statut : 1

3/vérifications: On vérifie que les champs soient bien rempli.

INSERT INTO membre (pseudo, mdp, email, photo, statut) VALUES ('', '', '', 'default.jpg', '1')
*/

//--------------------------------------------
//-----------------------------------------------------

$pdo = new PDO('mysql:host=localhost;dbname=tchat', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

$msg = '';


if(!empty($_POST)){

	if(!empty($_FILES['photo']['name'])){

		$nom_photo = time() . '_' . rand(0, 5000) . '_' . $_FILES['photo']['name'];
		echo $nom_photo;

		if($_FILES['photo']['type'] == 'image/jpeg' || $_FILES['photo']['type'] == 'image/gif' || $_FILES['photo']['type'] == 'image/png'){

			if($_FILES['photo']['size'] < 1000000){

				copy($_FILES['photo']['tmp_name'], __DIR__ . '/photo/' . $nom_photo);
			}
		}

	}else{
		$nom_photo = 'default.jpg';
	}

	// Les vérifications du pseudo
	if(empty($_POST['pseudo']) || empty($_POST['mdp']) || empty($_POST['email'])){
		$msg .= '<p style="color: white; background: red; padding: 5px">Veuillez remplir tous les champs du formulaire !</p>';
	}

	if(empty($msg)){


        $resultat = $pdo -> prepare("INSERT INTO membre (pseudo, mdp, email, photo, statut) VALUES (:pseudo, :mdp, :email, :photo, '1')");

		$resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
		$resultat -> bindParam(':mdp', $_POST['mdp'], PDO::PARAM_STR);
		$resultat -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
		$resultat -> bindParam(':photo', $nom_photo, PDO::PARAM_STR);

		$resultat -> execute();
	}
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulaire - Tchat</title>
    </head>
    <body>
        <?= $msg ?>
        <form method="post" action="" enctype="multipart/form-data">

    		<fieldset style="width:230px">
    			<legend>Formulaire</legend>
    			<label for="pseudo">Pseudo *</label><br />
    			<input type="text" id="pseudo" name="pseudo" value="<?php  if(isset($_POST['pseudo'])){echo $_POST['pseudo'];} ?>" /><br />

    			<label for="mdp">Mot de passe *</label><br />
    			<input type="password" id="mdp" name="mdp" value="<?php  if(isset($_POST['mdp'])){echo $_POST['mdp'];} ?>"/><br />

				<label>Votre avatar</label>
				<input type="file" name="photo" value="">

    			<label for="email">Email *</label><br />
    			<input type="email" id="email" name="email" value="<?php  if(isset($_POST['email'])){echo $_POST['email'];} ?>" /><br />

                <input type="submit" name="inscription" value="inscription"/>
            </fieldset>
        </form>

    </body>
</html>
