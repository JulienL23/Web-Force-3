<?php

$mysqli = new Mysqli('localhost','root','','entreprise');

// echo '<pre>';
// var_dump($mysqli);
// echo '</pre>';
/*
//$mysqli représente un objet de la classe Mysqli.
//On parle d'instance de la classe.Mysqli.
//Ce que l'on vient de faire c'est une instanciation.

L'instance de Mysqli nécessite 4 arguments :
    1 : Serveur de BDD
    2 : Login
    3 : MDP
    4 : Nom de la BDD

Méthode (fonction) Query() : La méthode query() de l'objet $mysqli permet d'effectuer des requête auprès de la base de données.
    arg : la formulation de notre requete (STR)

    Valeurs de retour :
        -> SELECT - SHOW :
            Succés : Mysqli_result (obj)
            Echec : FALSE (BOOL)

        -> UPDATE - INSERT - REPLACE - DELETE :
            Succés : TRUE (BOOL)
            Echec : FALSE (BOOL)
*/


// ETAPE 0 : Erreur volontaire de Requete

//$mysqli -> query("dfdefefefeggdzcef");
// Les erreurs SQL ne sont pas affichéess par défaut.
//echo $mysqli  -> error;  // permet d'afficher les erreurs SQL.

// --------------- ETAPE 1 : Requete INSERT (UPDATE, DELETE, REPLACE) ---------------
$mysqli -> query("INSERT INTO employes (prenom, nom, sexe, salaire, service, date_embauche) VALUES ('Chuck', 'Norris', 'm', 1200, 'informatique', CURDATE())");


// --------------- ETAPE 2 : Requete SELECT (un seul résultat)---------------

$resultat = $mysqli -> query("SELECT * FROM employes WHERE id_employes = 780");
// une requete nous retourne un (ou plusieurs) résultat(s), il faut donc stocker le résultat de la requête.

echo '<pre>';
print_r($resultat);
echo '</pre>';
// Le resultat de notre requete est un objet de la classe Mysqli_result.
// En l'état $resultat est INEXPLOITABLE !!!

$employe = $resultat -> fetch_assoc();
//$employe = $resultat -> fetch_row();

echo '<pre>';
print_r($employe);
echo '</pre>';

// La méthode (fonction) fetch_assoc() de l'objet $resultat (Mysqli_result) nous permet de créer un array où les indices sont les noms des champs dans la table. On parle d'Indexation associative.
// fetch_row : indexation numérique
// fetch_array : Effectue une indexation a la fois associative et à la fois numérique.

// --------------- ETAPE 3 : Requete SELECT (plusieurs résultats) ---------------------

$resultat = $mysqli -> query("SELECT * FROM employes") ;
// $resultat est un objet de mysqli_resultat.
// INEXPLOITABLE en l'état

while($employes = $resultat -> fetch_assoc()){
echo '<pre>';
print_r($employes);
echo '</pre>';
};

// Fetch_assoc() nous fait un array PAR ENREGISTREMENT, et non un array avec tous les enregistrements. Je suis donc OBLIGE de le faire dans une boucle lorsque ma requête me retourne plusieurs résultats !!!

//La boucle WHILE se comporte comme un curseur qui parcourt chaque enregistrement, pendant que fetch_assoc, les indexe...

// Un seul résultat : PAS DE BOUCLE !!
// Plusieurs résultats : UNE BOUCLE !!
// Si normalemenet un seul résultat, mais potentiellement plusieurs résultats : UNE BOUCLE !!

// --------------- ETAPE 4 : Dupliquer une table SQL en tableau HTML ---------------

$resultat = $mysqli -> query("SELECT * FROM employes");
// $resultat ==> OBJ Mysqli_result ===> INEXPLOITABLE

echo '<table border="1">';
echo '<tr>'; // creation de la ligne titre
while ($colonnes = $resultat -> fetch_field()) { // Cette boucle grace a fetch_field() va parcourir toutes les infos de la table et m'afficher le nom de chaque champs dans un <TH>
    //var_dump($colonnes);
    echo '<th>' . $colonnes -> name . '</th>';
}

echo '</tr>';// fermeture de ma ligne de titre
while($lignes = $resultat -> fetch_assoc()){ // Cette boucle, grace à fetch_assoc() va parcourir tout les enregistrements de ma table, créer une ligne <TR> pour chaque et stocker les infos dans un array ($lignes)
    echo '<tr>';

        foreach($lignes as $valeur){ // La boucle foreach va parcourir les valeurs de chaques enregistrements pour les afficher dans un <TD>
            echo '<td>' . $valeur . '</td>';
        }

    echo '</tr>';// fin de la ligne conrrespondant à chaque enregistrement
}
echo '</table>';// Fin du tableau.



?>
