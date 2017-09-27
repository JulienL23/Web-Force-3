<?php
require_once('inc/init.inc.php');
// Traitement pour rediriger l'utilisateur s'il est déjà connecté
if (!userConnecte()) {
    header('location:profil.php');
}
extract($_SESSION['membre']);

require_once('inc/header.inc.php');
 ?>

 <!-- Contenu HTML -->
 <h1>Profil de <?= $pseudo ?> </h1>
<div class="profil">
<div class="profil_img">
    <img src="img/profil.png">
</div>
<div class="profil_infos">
    <ul>
        <li>Pseudo : <b><?= $pseudo ?></b></li>
        <li>Prénom : <b><?= $prenom ?></b></li>
        <li>Nom :<b><?= $nom ?></b></li>
        <li>Email : <b><?= $email ?></b></li>
    </ul>
</div>
<div class="profil_adresse">
    <ul>
        <li>Pseudo : <b><?= $adresse ?></b></li>
        <li>Code Postal : <b><?= $code_postal ?></b></li>
        <li>Ville : <b><?= $ville ?></b></li>
    </ul>
</div>
<div class="profil">
    <h2>Détails des commandes</h2>
    <p>Vous n'avez pas encore passé de commande !<br/>Venez visiter <a href="boutique.php"><u>notre boutique</u></a></p>
</div>
</div>







<?php
require_once('inc/footer.inc.php')
?>
