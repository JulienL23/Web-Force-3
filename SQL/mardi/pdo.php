<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=mardi;charset=utf8','root','');

    echo "ok";

} catch (PDOException $e) {
    echo "Impossible de se connecter.";
    exit;
}

############
## INSERT ##
############


### valeurs anonymes -> ? ###
// 1- On met dans une table les données que l'on veut insérer
$data = array("Ledoux","Julien",1);
// 2- On prépare la requête
$req = $bdd->prepare('INSERT INTO contacts(co_name, co_firstname, co_gender) VALUES (?, ?, ?)');
// 3- On éxécute la requête
$req->execute($data);
echo "ok";

################################################################

## valeurs nommées -> : nom ##
// 1- On met dans une table indéxée les données que l'on veut insérer
$data = array("name"=>"Jack","firstname"=>"Sparow",'gender'=>1);
// 2- On prépare la requête
$req = $bdd->prepare('INSERT INTO contacts(co_name, co_firstname, co_gender) VALUES (:name, :firstname, :gender)');
// 3- On éxécute la requête
$req->execute($data);
echo "ok";

############
## UPDATE ##
############

$req = $bdd->exec('UPDATE contacts SET co_firstname = "Chloé" WHERE co_id = 1 ');

############
## DELETE ##
############

$bdd->exec("DELETE FROM contacts WHERE co_id > 17 AND co_id < 37 ");

?>
