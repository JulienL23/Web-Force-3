<?php

function inclusionAutomatique($nomDeLaClass)
{
    include_once($nomDeLaClass . '.class.php');
    echo 'On passe dans inclusionAutomatique. <br>';
    echo "require($nomDeLaClass.class.php);<hr>";
}

spl_autoload_register('inclusionAutomatique');

// Permet d'éxécuter une fonction lorsque l'interpréteur voit passer un "new" dans le code. Le nom à droite du "New" (nom de la class) est passé automatiquement en argument à cette fonction.

$a = new A;
$b = new B;
$c = new C;
$d = new D;
 ?>
