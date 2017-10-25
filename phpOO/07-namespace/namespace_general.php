<?php

namespace General;
require_once('commerce.php');

// Permet d'importer les namespace pour les utiliser ensuite.
USE Commerce1, Commerce2, Commerce3;

$commande = new Commerce1\Commande;
$produit1 = new Commerce2\Produit;
$produit2 = new Commerce3\Produit;
 ?>
