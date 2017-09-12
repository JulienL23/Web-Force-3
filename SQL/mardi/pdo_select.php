<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=mardi;charset=utf8','root','');
    echo "ok";
} catch (PDOException $e) {
    echo "Impossible de se connecter.";
    exit;
}

############
## SELECT ##
############

$req = $bdd->query('SELECT * FROM contacts WHERE co_firstname <> "Chloé" ');
//tant que l'on peut stocker une ligne d'enregistrement dans la variable $datas alors on fait qqchose
while($datas = $req->fetch()){
    print_r($datas);
    echo "<br />";
}

$req = $bdd->query('SELECT * FROM contacts');
// pour récupérer tous les enregistrements dans $datas
$datas = $req->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($datas);
echo "</pre>";
?>
