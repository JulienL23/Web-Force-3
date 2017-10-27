<?php

require_once("init.inc.php");
$tab = array();
$tab['resultat'] = '';


$resultat = $pdo -> query("SELECT * FROM employes WHERE prenom = '$_POST[personne]'");
$employes = $resultat -> fetchAll(PDO::FETCH_ASSOC);


$tab['resultat'] .= '<table border="1">';
$tab['resultat'] .= '<tr>';//ligne des titres

for($i = 0; $i < $resultat -> columnCount(); $i++ ){
    $colonne = $resultat -> getColumnMeta($i);
    $tab['resultat'] .= '<th>' . $colonne['name'] . '</th>';
}

$tab['resultat'] .= '</tr>';//fin ligne des titres

foreach ($employes as $valeur) {//parcout tous les enregistrements
    $tab['resultat'] .= '<tr>'; // ligne pour chaque enregistrement
        foreach ($valeur as $valeur2) { // Parcourt toutes les infos de chaque enregistrement
            $tab['resultat'] .= '<td>' . $valeur2 . '</td>';
        }
    $tab['resultat'] .= '</tr>';
}

$tab['resultat'] .= '</table>';

//echo $tab['resultat'];

echo json_encode($tab);
// json_encode permet de transformer le tableau ARRAY au bon format (JSON)

// Ce format (JSON) assure la possibilité de transporter les données. Sans JSON, nous ne pouvons pas transporter les données.
?>
