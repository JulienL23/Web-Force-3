<?php
require_once('../inc/init.inc.php');
if(isset($_GET['msg']) && $_GET['msg'] == 'validation' && isset($_GET['id'])) {
    $msg .= '<div class="validation">Le membre N° ' . $_GET['id'] .' a été correctement enregistré !</div>';
}
if(isset($_GET['msg']) && $_GET['msg'] == 'suppr' && isset($_GET['msg'])) {
    $msg .= '<div class="validation">Le membre N° ' . $_GET['id'] .' a été correctement supprimé !</div>';
}
// 4 : Duppliquer une table SQL en tableau HTML
$resultat = $pdo -> query("SELECT * FROM membre");
$membre = $resultat -> fetchAll(PDO::FETCH_ASSOC);
$contenu .= 'Nombre de résultats : ' .$resultat -> rowCount() .'<br/><hr/>';
$contenu .= $msg;
$contenu .= '<table border="1">';
$contenu .='<tr>';
for($i = 0; $i < $resultat -> columnCount(); $i++){
    $colonne = $resultat -> getColumnMeta($i);
    $contenu .= '<th>' . $colonne['name'] . '</th>';
}
$contenu .= '<th colspan="2">Actions</th>';
$contenu .='</tr>';
foreach($membre as $value) { // Parcourt tous les enregistrements
    $contenu .= '<tr>';// ligne pour chaque enregistrement
        foreach($value as $indice => $value2) { // Parcourt toutes les infos de chaque enregistrements
            if($indice == 'photo') {
                $contenu .= '<td><img src="' . RACINE_SITE . 'image/' . $value2 . '" height="90"/></td>';
            }
            else {
            $contenu .= '<td>' . $value2 . '</td>';
            }
        }
        $contenu .= '<td><a href=""><img src="../img/edit.png" /></td>';
        $contenu .= '<td><a href="supprime_membre.php?id=' . $value['id_membre'] .'"><img src="../img/delete.png" /></td>';
    $contenu .= '</tr>';
}
$contenu .= '</table>';
$page="Gestion Membres";
require_once('../inc/header.inc.php');
?>
<!-- Contenu HTML -->
<h1>Gestion des membres</h1>
<a class="btn-add" href="formulaire_produit.php">Ajouter un membre</a>
<?= $contenu; ?>
<?php
require_once('../inc/footer.inc.php');
?>
