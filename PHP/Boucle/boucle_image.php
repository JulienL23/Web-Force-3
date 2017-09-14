<?php
// boucle/exemple_boucle.php

// 1 : Télécharger 5 images sur google : image1.jpg,image2.jpg,image3.jpg,image4.jpg,image5.jpg

//2 : Afficher l'image 1 grâce à une balise <img />

//3 : Afficher 5 fois l'image 1 grâce à une boucle while.

//4 : Afficher les 5 images grâce à une boucle while

// 2 :
echo '<img src="img/image1.jpg""width="250px"></br>';

echo "<br/><hr/>";

// 3 :
$i = 0;

while($i <= 4){
    //traitements à effectuer
    echo '<img src="img/image1.jpg"width="250px">';
    $i ++;
}

echo "<br/><hr/>";

// 4 :
$a = 1;

while($a <= 5){
    //traitements à effectuer
    echo '<img src="img/image'. $a .'.jpg"width="250px">';
    $a++;
}


?>
