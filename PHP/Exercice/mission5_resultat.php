<?php

if (!empty($_POST)) {

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    extract($_POST);

if(is_numeric($n1) && is_numeric($n2)){

    switch ($operateur) {
        case 'addition':
            $resultat = $n1 + $n2;
            break;
        case 'soustraction':
            $resultat = $n1 - $n2;
            break;
        case 'multiplication':
            $resultat = $n1 * $n2;
            break;
        case 'division':
            $resultat = $n1 / $n2;
            break;
        default :
            header('location:mission5_calculatrice.php');
        break;
    }
    $msg = 'Le résultat est : ' . $resultat . '<br/>';
}
else{
    $msg = 'Veuillez saisir des valeurs numériques.';
}
 ?>

<a href="mission5_calculatrice.php">Effectuer un autre calcul</a>
