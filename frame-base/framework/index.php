<?php
function dd($var)
{
    echo '<pre>'; print_r($var); echo '</pre>';
}

// On inclu/require le controller général de l'application, qui va interpréter l'URL, lancer le bon controller, et lancer la bonne méthode. C'est la fonction handlerequest qui va faire le tri dans ce qu'il y a dans l'URL et lancer l'application.


require('controller/controller.php');
$controller = new Controller;
$controller->handleRequest();
