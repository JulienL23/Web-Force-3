<?php

echo '<pre>';
echo print_r($_POST);
echo '</pre>';

################
// FIRST METHOD
################


/*if(!empty($_POST)){// On vérifie que post ne soit pas vide avant de faire des traitements.

    foreach($_POST as $indice => $valeur){
        if(empty($valeur)){
            echo '<p style="background:red; color:white; padding : 5px;">Veuillez renseigner le champs ' . $indice .'</p>';
        }
        else
        {
            echo $indice . ' : <p style="background:green; color:white; padding : 5px;display : inline-block;">' . $valeur . '</p><br/>';
        }
    }
}*/


#################
// SECOND METHOD
#################


$msg = '';

if (!empty($_POST)) {
    if(empty($_POST['pseudo'])){
        $msg .= '<p style="background: red; color: white; padding: 5px; ">Veuillez renseigner un pseudo</p>';
    }
    if(empty($_POST['email'])){
        $msg .= '<p style="background: red; color: white; padding: 5px; ">Veuillez renseigner un email</p>';
    }
    echo $msg;

    if(empty($msg)){ // signifie que tout est OK ! Les feux sont au vert, on peut effectuer les traitements attendus (enregistrer dans la bdd par exemple).
        echo '<p style="background:green; color:white; padding: 5px;">GG ! Tu es bien enregistré !</p>';

        // traitement pour enregistrer les infos dans un fichier .txt

        $f = fopen('liste.txt', 'a'); // fopen() est une fonction native qui nous permet d'ouvrir un fichier. En mode 'a', si le fichier n'existe pas il sera créer automatiquement. Ici, $f va représenter ce fichier.

        fwrite($f, $_POST['pseudo'] . ' - ' . $_POST['email'] . "\r\n");// Fwrite() nous permet d'enregistrer des informations dans un fichier : Arg1: le fichier, Arg2 : l'info à enregistrer.
    }
    else{
        echo '<a href="formulaire3.php">Retour au formulaire</a>';
    }
}
?>


<h1>Formulaire 4</h1>
