<?php

require_once("init.inc.php");
$tab = array();
$tab['monresultat'] = '';


$resultat = $pdo -> query("SELECT * FROM employes WHERE prenom = '$_POST[personne]'");
$employes = $resultat -> fetchAll(PDO::FETCH_ASSOC);


$tab['monresultat'] .= '<table border="1">';
$tab['monresultat'] .= '<tr>';//ligne des titres

for($i = 0; $i < $resultat -> columnCount(); $i++ ){
    $colonne = $resultat -> getColumnMeta($i);
    $tab['monresultat'] .= '<th>' . $colonne['name'] . '</th>';
}

$tab['monresultat'] .= '</tr>';//fin ligne des titres

foreach ($employes as $valeur) {//parcout tous les enregistrements
    $tab['monresultat'] .= '<tr>'; // ligne pour chaque enregistrement
        foreach ($valeur as $valeur2) { // Parcourt toutes les infos de chaque enregistrement
            $tab['monresultat'] .= '<td>' . $valeur2 . '</td>';
        }
    $tab['monresultat'] .= '</tr>';
}

$tab['monresultat'] .= '</table>';

//echo $tab['monresultat'];

$f = fopen('test.txt', 'a');
fwrite($f, json_encode($tab));

echo json_encode($tab);
// json_encode permet de transformer le tableau ARRAY au bon format (JSON)

// Ce format (JSON) assure la possibilité de transporter les données. Sans JSON, nous ne pouvons pas transporter les données.
?>
