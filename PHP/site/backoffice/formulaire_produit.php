<?php
require_once('../inc/init.inc.php');

if (!empty($_POST)) {
    debug($_POST);
    debug($_FILES);

    // Renommer / ref_time()_nom.ext
    // controles sur la photo
    // enregistrer la photo sur le serveur.

    // Controle sur les infos du formulaire (pas vide, nombre de caractère etc...)
    // Requete pour insérer les infos dans la BDD.
    // redirection sur gestion_boutique.php

    $nom_photo = 'default.jpg'; 

    if (!empty($_FILES['photo']['name'])) { // Si une photo est uploadée
        $nom_photo = $_POST['reference'] . '_' . time() . '_' . $_FILES['photo']['name'];
        // Si la photo est nommé tshirt.jpg, on la renomme : XX21_15432324454_tshirt.jpg pour éviter les doublons possibles sur le serveur (cf les noms des photos sur facebook par exemple).

        $chemin_photo = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . 'photo/' . $nom_photo;
        // chemin c://xampp/htdocs  /PHP/site/   photo/XX21_15432324454_tshirt.jpg

        $ext = array('image/png', 'image/jpeg', 'image/gif');
        if (!in_array($_FILES['photo']['type'], $ext)) {
            $msg .= '<div class="erreur">Images autorisées : PNG, JPG, JPEG et GIF</div>';
            // Si le fichier uploadé ne correspond pas aux extensions autorisées (ici PNG, JPEG, JPG et GIF) alors on affiche un message d'erreur.
        }

        if ($_FILES['photo']['size'] > 2000000) {
            $msg .= '<div class="erreur">Images ! 2mo maximum autorisé</div>';
            // Si la photo uploadées est trop volumineuse (ici 2Mo max), alors on met un message d'erreur.
            // Par defaut XAMPP autorise 2,5MO. Voir dans php.ini, rechercher upload_max_file_size=2.5M
        }

        if (empty($msg) && $_FILES['photo']['error'] == 0){

            copy($_FILES['photo']['tmp_name'], $chemin_photo);
            // On enregistre la photo sur le serveur. Dans les fait, on la copier depuis son emplacement temporaire et on la colle dans son emplacement définitif.
        }
    }// fun du if isset($_FILES['photo']['name'])

    //Insérer les infos du produit en BDD ...
    //Au préalable nous aurions vérifier tous les champs (taille, caractères, nom empty etc...)

    if (empty($msg)) {
        $resultat = $pdo -> prepare("INSERT INTO produit (reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES (:reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)");

        $resultat -> bindParam(':reference', $_POST['reference'], PDO::PARAM_STR);
        $resultat -> bindParam(':categorie', $_POST['categorie'], PDO::PARAM_STR);
        $resultat -> bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
        $resultat -> bindParam(':description', $_POST['description'], PDO::PARAM_STR);
        $resultat -> bindParam(':couleur', $_POST['couleur'], PDO::PARAM_STR);
        $resultat -> bindParam(':taille', $_POST['taille'], PDO::PARAM_STR);
        $resultat -> bindParam(':public', $_POST['public'], PDO::PARAM_STR);

        $resultat -> bindParam(':prix', $_POST['prix'], PDO::PARAM_STR);
        $resultat -> bindParam(':stock', $_POST['stock'], PDO::PARAM_INT);

        $resultat -> bindParam(':photo', $nom_photo, PDO::PARAM_STR);

        if($resultat -> execute()){

            $pdt_insert = $pdo -> lastInsertId();// Récupère l'ID du dernier enregistrement.
            header('location:gestion_boutique.php?msg=validation&id=' . $pdt_insert);
        }
    }



}// fin du if (!empty($_POST))


require_once('../inc/header.inc.php');
 ?>

 <!-- Contenu HTML -->
 <h1>Ajout d'un produit</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label>Reference</label>
        <input type="text" name="reference">

        <label>Categorie</label>
        <input type="text" name="categorie">

        <label>Titre</label>
        <input type="text" name="titre">

        <label>Description</label>
        <input type="text" name="description">

        <label>Couleur</label>
        <input type="text" name="couleur">

        <label>Taille</label>
        <input type="text" name="taille">

        <label>Public</label>
        <select name="public">
            <option value="m">Homme</option>
            <option value="f">Femme</option>
            <option value="mixte">Mixte</option>
        </select>

        <label>Photo</label>
        <input type="file" name="photo">

        <label>Prix</label>
        <input type="text" name="prix">

        <label>Stock</label>
        <input type="text" name="stock">

        <input type="submit" name="">

    </form>









<?php
require_once('../inc/footer.inc.php')
?>
