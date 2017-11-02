<?php
function jourSemaine()
{
    $jourLocal = "lundi"; // variable locale
    return $jourLocal;
    echo "ALLOOOOOOOO";
}

$jourGlobal = jourSemaine();
echo $jourGlobal;

//--------------------------------
echo "<br><hr>";
//--------------------------------

$pays = "France";
function affichagePays()
{
    global $pays;
    echo $pays;
}

affichagePays();
