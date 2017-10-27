<?php
//Réaliser le code PHP permettant d'afficher l'enssemble des employés dans un tableau (stocker le resultat dans un tableau ARRAY)

require_once("init.inc.php");

// $resultat = $pdo -> exec("INSERT INTO employes (prenom) VALUES('$_POST[personne]')");

$tab = array();
$tab['resultat'] = '';

$resultat = $pdo -> query("SELECT * FROM employes");
$employes = $resultat -> fetchAll(PDO::FETCH_ASSOC);


$tab['resultat'] .= '<table border="1">';
$tab['resultat'] .= '<tr>';

for($i = 0; $i < $resultat -> columnCount(); $i++ ){
    $colonne = $resultat -> getColumnMeta($i);
    $tab['resultat'] .= '<th>' . $colonne['name'] . '</th>';
}

$tab['resultat'] .= '</tr>';

foreach ($employes as $valeur) {
    $tab['resultat'] .= '<tr>';
        foreach ($valeur as $valeur2) {
            $tab['resultat'] .= '<td>' . $valeur2 . '</td>';
        }
    $tab['resultat'] .= '</tr>';
}

$tab['resultat'] .= '</table>';

//echo $tab['resultat'];

// $f = fopen('test.txt', 'a');
// fwrite($f, json_encode($tab));

echo json_encode($tab);
// json_encode permet de transformer le tableau ARRAY au bon format (JSON)

// Ce format (JSON) assure la possibilité de transporter les données. Sans JSON, nous ne pouvons pas transporter les données.

 ?>
