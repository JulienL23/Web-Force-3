<?php
echo "Hello world";


// comentaires


/*
commentaires 1
commentaires 2
*/


################
##COMMENTAIRES##
################


#################
##LES VARIABLES##
#################

// camelCase
$ageDuCapitaine = 24;
// underscore
$age_du_capitaine = 58;

$nom = "Ledoux";
$prenom = "Julien";

// Le symbole de concaténation en PhP est : "."
echo "<br /> Bonjour ".$nom." ".$prenom;

echo "<br /> Le capitaine ".$prenom." a ".$ageDuCapitaine."an";

if ($ageDuCapitaine>1) {
    echo "s";
}
echo ".";

#################
##LES TABLEAUX###
#################

// déclarer un tableau vide
$table = array();
// soit
$table = [];

$table = array ('Pascal','Karim','Bernadette');
// pour accéder à un éklément d'un tableau
echo "<br />".$table[2];

//pour connaitre le nombre d'éléments d'un tableau
echo "<br />Le tableau a ".count($table)."élément(s)";

//lister le contenu du tableau avec une boucle for
for($i = 0; $i < count($table); $i++){
    echo "<br />".$table[$i];
    // echo "<br />".$i;
}

//lister avec un foreach
$couleurs = array('rouge','vert','jaune');
foreach ($couleurs as $couleur) {
    echo "<br />".$couleur;
}

########################
##LES TABLEAUX INDEXES##
########################

$armoire = array('pantalon' =>5, 'chemise' =>7, 'chaussette'=>7);
// pour accéder à un élément
echo "<br />Nombre de chausettes : ".$armoire['chaussette'];

//pour ajouter un élément
$armoire['costume'] = 1;

//pour modifier un élément
$armoire['pantalon'] = 8;

//lister tous les éléments de mon tableau
foreach ($armoire as $nomEtagere => $nombreVetements) {
    echo "<br />".$nomEtagere." : ".$nombreVetements;
}
echo"<br /><br />";

// en mode débugage, pour voir tout le contenu d'un tableau
echo "<pre>";
print_r($armoire);
echo "</pre>";

var_dump($armoire);

$employes = array(
    array('nom'=>"Mike",'age'=> 44),
    array('nom'=>"Tyson",'age'=> 23),
    array('nom'=>"Rick",'age'=> 26)
);
echo "<br />";
foreach ($employes as $employe) {
    echo "<br />";
    foreach ($employe as $key => $value) {
        echo $key." --> ".$value." ";
    }
}

//si on veut le nom du premier employé
echo "<br />".$employes[0]['nom'];
//je veux l'age du dernier employé
echo "<br />".$employes[count($employes)-1]['age'];
?>
