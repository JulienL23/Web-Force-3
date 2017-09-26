<?php

session_start();
$pdo = new PDO('mysql:host=localhost;dbname=tchat', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

$msg = '';

// echo '<pre>';
// print_r($_POST);
// print_r($_FILES);
// echo '</pre>';

// TRAITEMENT POUR LA CONNEXION !

if (isset($_POST['connexion'])) {// si le formulaire de connexion est activé

	if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
		//Si les deux sont remplis, on va vérifier :
			//1 : Que le membre existe.

			$resultat = $pdo -> prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
			$resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
			$resultat -> execute();

			if($resultat -> rowCount() > 0){
				// cela signifie qu'il existe bien un membre avec ce pseudo.

				$membre = $resultat -> fetch(PDO::FETCH_ASSOC);

				if($membre['mdp'] == $_POST['mdp']){

					// Cela signifie que tout est OK, le speudo existe, le mdp concorde bien... donc on connecte le membre :

					// $_SESSION['pseudo'] = $membre['pseudo'];
					// $_SESSION['email'] = $membre['email'];
					// $_SESSION['photo'] = $membre['photo'];

					//la même dans un foreach
					foreach ($membre as $indice => $valeur) {
						$_SESSION[$indice] = $valeur;
					}
					// On récupère toutes les infos du membre pour les stocker dans le fichier de session. Normalement il est préférable d'exclure le MDP.

					header('location:message.php');

				}else{
					$msg .= "Vous n'avez pas saisie le bon mot de passe !";
				}


			}else{
				$msg .= "Ce pseudo n'est pas reconnu !";
			}
	}

}

// TRAITEMENT POUR L'INSCRIPTION !
if(isset($_POST['inscription'])){ // Si le formulaire d'inscription est activé

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
		<title>Tchat Fonderie</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" />
	</head>
	<body>
		<header>
		</header>
		<nav>
		</nav>
		<main>
			<?php if(!empty($msg)) : ?>
				<p style="background:rgb(222, 153, 153); color: darkred; padding:5px; border: 2px solid darkred; border-radius: 4px"><?= $msg ?></p>
			<?php endif; ?>
			<h1>Accueil</h1>

			<div class="inscription">
				<h2>Inscription</h2>

				<form id="formu" method="post" action="" enctype="multipart/form-data">


		    		<fieldset style="width:350px">

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




			</div>

			<div class="connexion">
				<h2>Connexion</h2>
				<p>Si vous avez déjà un compte, connectez-vous :</p>
				<form method="post" action="">
					<input type="text" name="pseudo" placeholder="pseudo" />
					<input type="password" name="mdp" placeholder="Mot de passe" />
					<input type="submit" name="connexion" value="Connexion" />
				</form>
			</div>
		</main>
	</body>
</html>
