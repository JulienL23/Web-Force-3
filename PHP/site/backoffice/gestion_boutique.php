<?php
require_once('../inc/init.inc.php');

if (isset($_GET['msg']) && $_GET['msg'] == 'validation' && isset($_GET['id'])) {
    $msg .= '<div class="validation">Le produit N°' . $_GET['id'] . ' a été correctement enregistré!</div>';
}

if(isset($_GET['msg']) && $_GET['msg'] == 'suppr' && isset($_GET['id'])) {
    $msg .= '<div class="validation">Le produit N°' . $_GET['id'] . ' a été correctement supprimé !</div>';
}

$resultat = $pdo -> query("SELECT * FROM produit");
$produit = $resultat -> fetchAll(PDO::FETCH_ASSOC);
$contenu .= 'Nombre de résultats : ' . $resultat -> rowCount() . '<br/><hr/>';

$contenu .= $msg;
$contenu .= '<table border="1">';
$contenu .= '<tr>';//ligne des titres

for($i = 0; $i < $resultat -> columnCount(); $i++ ){
    $colonne = $resultat -> getColumnMeta($i);
    $contenu .= '<th>' . $colonne['name'] . '</th>';
}

$contenu .= '  <th colspan="2">Actions</th>';
$contenu .= '</tr>';//fin ligne des titres

foreach ($produit as $valeur) {//parcout tous les enregistrements
    $contenu .= '<tr>'; // ligne pour chaque enregistrement

        foreach ($valeur as $indice => $valeur2) { // Parcourt toutes les infos de chaque enregistrement
            if ($indice == 'photo') {
                $contenu .= '<td><img src ="' . RACINE_SITE . 'photo/' . $valeur2 . '" height="90"/></td>';
            }else{
                $contenu .= '<td>' . $valeur2 . '</td>';
            }
        }
        $contenu .= '<td><a href=""><img src="../img/edit.png"></a></td>';
        $contenu .= '<td><a href="supprime_produit.php?id=' . $valeur['id_produit'] .'"><img src="../img/delete.png"></a></td>';

    $contenu .= '</tr>';
}
$contenu .= '</table>';





$page = 'Gestion Boutique';
require_once('../inc/header.inc.php');
?>

 <!-- Contenu HTML -->
 <h1>Gestion des produits de la boutique</h1>


 <a class="btn-add" href="formulaire_produit.php">Ajouter un produit</a>

 <?= $contenu; ?>







<?php
require_once('../inc/footer.inc.php')
?>
