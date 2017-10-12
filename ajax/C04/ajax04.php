<?php
require_once('init.inc.php');
$resultat = $pdo -> query ("DELETE FROM employes WHERE prenom = '$_POST[personne]'");

$resultat = $pdo -> query ("SELECT * FROM employes" );
$employes = $resultat -> fetchAll(PDO::FETCH_ASSOC);

$tab = array();
$tab['monresultat'] = "";

$tab['monresultat'] .='<select id="personne" name="personne">';

   foreach ($employes as $value) {
       $tab['monresultat'] .= '<option>'.$value['prenom'].'</option>';
   }

$tab['monresultat'] .= '</select>';

//echo $tab['monresultat'];

echo json_encode($tab);

?>
