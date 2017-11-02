<?php

session_start();

$_SESSION["pseudo"] = "Picsou23";
$_SESSION["prenom"] = "Julius";
$_SESSION["nom"] = "King";
echo "<hr>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

// unset($_SESSION['nom']);
// echo "<hr>";
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
//
// session_destroy();
// echo "<hr>";
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

?>
