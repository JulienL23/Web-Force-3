<!-- <?php

// $msg = '';
//
// if (!empty($_POST)) {
//     if(empty($_POST['pseudo'])){
//         $msg .= '<p style="background: red; color: white; padding: 5px; ">Veuillez renseigner un pseudo</p>';
//     }
//     if(empty($_POST['email'])){
//         $msg .= '<p style="background: red; color: white; padding: 5px; ">Veuillez renseigner un email</p>';
//     }
//     echo $msg;
//
//     if(empty($msg)){
//
//         echo '<p style="background:green; color:white; padding: 5px;">GG ! Tu es bien enregistré !</p>';
//         echo '<a href="formulaire.php">Retour au formulaire</a>';
//
//         $f = fopen('liste.txt', 'a');
//
//         fwrite($f, $_POST['pseudo'] . ' - ' . $_POST['email'] . "\r\n");
//     }
//     else{
//         echo '<a href="formulaire.php">Retour au formulaire</a>';
//     }
// }
//
// $fichier = file('liste.txt');
//
// foreach($fichier as $indice => $valeur){
//
//     $position = strpos($valeur, ' - ');
//
//     $pseudo = substr($valeur, 0 ,$position);
//     $email = substr($valeur, $position+3);
//
//     echo '<h5>Inscrit N°' . ($indice+1) . '</h5>';
//     echo "Pseudo : " . $pseudo . '<br/>';
//     echo "Email : " . $email . '<hr/>';
//}
?> -->

<?php

if($_POST){

    if (strlen($_POST['pseudo']) == 0) {
        echo "Vous devez saisir pseudo";
    }else {

        echo "pseudo : " . $_POST['pseudo'] . "<br>";
        echo "email : " .$_POST['email'] . "<br>";
    }
    
    $f = fopen("liste.txt", "a");
    fwrite($f, $_POST['pseudo'] . "-");
    fwrite($f, $_POST['email'] . "\n");
    $f = fclose($f);
}
 ?>
