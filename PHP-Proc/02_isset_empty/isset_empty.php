<?php

$var = 0;
$var2 = "";

echo "<h1> EMPTY </h1>";

if (empty($var1)) { // l'affiche
    echo "0, vide ou non définie (var1)<hr>";
}

echo "<br>";

if (empty($var2)) { // l'affiche
    echo "0, vide ou non définie (var2)<hr>";
}

echo "<br>";
echo "<h1> ISSET </h1>";

if (isset($var1)) { // l'affiche pas
    echo "0, vide ou non définie (var1)<hr>";
}

echo "<br>";

if (isset($var2)) { // l'affiche
    echo "0, vide ou non définie (var2)<hr>";
}

echo '<h1>Cours Barba</h1>';

$var1 = 0;
// $var2 = '';

if(empty($var2)){
   echo "0, vide ou non définie<br>"; // empty vérifie ces 3 choses; affiche même si ca existe pas
}
if(isset($var3)){
   echo "0, vide ou non définie<br>"; // isset si ca existe
}
 ?>
