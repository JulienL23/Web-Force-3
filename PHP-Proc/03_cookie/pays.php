<?php

if(isset($_GET['pays'])){ // Cela signifie que l'utilisateur vient à l'instant de cliquer sur un des liens pour choisir une langue
    $pays = $_GET['pays'];
}elseif (isset($_COOKIE['pays'])) { // Cela signifie que l'utilisateur été déjà venu, et j'avais déjà enregistré son choix dans un cookie.
    $pays = $_COOKIE['pays'];

}else { // je n'ai ni cookie, ni get précisant la langue, il est possible que l'utilisateur vienne pour la premiere fois et que la langue par defaut lui convienne très bien.
    $pays = 'fr';

}

$un_an = 365*24*3600;
setCookie("pays", $pays, time()+$un_an);

switch($pays){
    case 'fr' :
        echo 'Bonjour, bienvenue !';
    break;

    case 'por' :
        echo 'Bom Dia !';
    break;

    case 'jap' :
        echo 'もしもし !';
    break;

    case 'can' :
        echo 'Hello, bonjour !';
    break;

    default :
        echo 'Veuillez choisir une langue dans la liste présente !';
    break;
}

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>Votre langue :</h1>
        <ul>
            <a href="?pays=fr"><li>France</li></a>
            <a href="?pays=por"><li>Portugal</li></a>
            <a href="?pays=jap"><li>Japon</li></a>
            <a href="?pays=can"><li>Canada</li></a>
        </ul>
    </body>
</html>
