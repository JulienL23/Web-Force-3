<?php
require_once('../inc/init.inc.php');

if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {

   $resultat = $pdo -> prepare("SELECT * FROM membre WHERE id_membre = :id");
   $resultat -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
   $resultat -> execute();

   if($resultat -> rowCount() > 0) {
       $membre = $resultat -> fetch(PDO::FETCH_ASSOC);
       debug($membre);


       $resultat = $pdo -> exec("DELETE FROM membre WHERE id_membre = $membre[id_membre]");
       if($resultat) {
           header('location:gestion_membres.php?msg=suppr&id=' .$membre['id_membre']);
       }


   }
}

?>
