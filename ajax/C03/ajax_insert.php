<?php

require_once("init.inc.php");
// Réaliser une requete d'insert permettant d'insérer un prénom dans la BDD via le formulaire HTML

$resultat = $pdo -> exec("INSERT INTO employes (prenom) VALUES('$_POST[personne]')");


 ?>
