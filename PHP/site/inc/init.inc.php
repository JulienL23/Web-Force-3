<?php

//SESSION
session_start();

//CONNEXION BDD
$pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
));

// VARIABLES
$msg =''; // permet de communiquer avec l'utilisateur
$page = ''; // contiendra le nom de la page en cours de visite (menu surbrillance + title de la page)
$contenu = ''; // nous permettra ponctuellement de stocker du contenu a afficher.

// CHEMINS
// toujours mettre le / avant et aprés mon chemin
define('RACINE_SITE','/WebForce3/Web-Force-3/PHP/site/');

// AUTRES INCLUSIONS
require('fonctions.inc.php');
?>
