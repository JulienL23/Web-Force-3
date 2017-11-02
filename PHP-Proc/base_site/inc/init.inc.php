<?php
// -----------------------------BDD
$mysqli = new mysqli("localhost", "root", "", "base_site");
if ($mysqli->connect_error) die('Un problème est survenu lors de la connexion à la BDD : ' . $mysqli->connect_error);
$mysqli->set_charset('utf-8');

// -----------------------------SESSION
session_start();

// -----------------------------CHEMIN
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . "/base_site/");
define("URL", "http://localhost/Web-Force-3/PHP-Proc/base_site/");

// echo RACINE_SITE . "<hr>";
// echo URL;

$contenu = "";

require_once("functions.inc.php");
