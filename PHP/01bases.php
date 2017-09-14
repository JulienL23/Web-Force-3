<h2>Ecriture et affichage</h2>
<!-- Première chose : On constate qu'on peut écrire de l'HTML dans un fichier PHP ! (l'inverse n'est pas possible)-->


<?php
	echo 'Bonjour'; //echo est une instruction qui nous permet d'effectuer un affichage.
	echo '<br />'; // Nous pouvons également générer l'affichage d'HTML grâce à echo.

	echo "<h2>Les commentaires</h2>";
	echo 'texte'; // Ceci est un commentaire sur une ligne
	echo 'texte'; /* Ceci est un commentaire
	sur plusieurs
	lignes
	*/

	echo '<h2>Variables : Types, déclaration et affectation : </h2>';

	$a = 127; // Affectation de la valeur 127 dans la variable a.
	echo gettype($a)." "; // entier (INTEGER)

	$b = 1.5;
	echo gettype($b)." "; // Chiffre à virgule (DOUBLE)

	$c = 'Chaîne de caractères';
	echo gettype($c)." "; // Chaîne de caractère (STRING)

	$d = TRUE;
	echo gettype($d); // TRUE or FALSE -- Boléen (BOOLEAN)

	//$ma-super-variable; // le '-' est utiliser pour la soustraction

	$ma_super_variable = 1; // OK ! snake_case
	$maSuperVariable = 1; // OK ! camelCase
	$MaSuperVariable = 1; // OK ! StreadyCase

	$prenom = 'Julien'; // OK ! Pas d'accent
	$prenom1 = 'Chuck'; // OK !

	echo '<h2>La concaténation</h2>';
	$x = 'Bonjour';
	$y = ' tout le monde !';

	echo $x . $y . '<br/>'; // On peut traduire le '.' par 'suivis de';
	echo "$x $y <br/>"; // même chose sans concaténation

	echo 'Hey ! ' . $x . $y . '<br/>';
	echo 'Hey ! ' , $x , $y , '<br/>'; // La concaténation existe également avec ',' mais est très peu utilisée.

	echo '<h2>Concaténation lors de l\'affectation</h2>';

	$prenom1 = 'Bruno'; // Affectation de la valeur Bruno.
	$prenom1 = 'Claire'; // Affectation de la valeur Claire qui remplace Bruno.

	$prenom2 = 'Nicolas'; // Affectation de la valeur Nicolas.
	$prenom2 .= ' Marie'; // Affectation de la valeur Marie, cela ajoute la valeur Marie.
	//Fait ceci : $prenom2 = $prenom2 . ' Marie';
	echo $prenom2;

	echo '<h2>Guillemets et quotes</h2>';

	$jour = "Aujourd'hui";
	$jour = 'Aujourd\'hui';// Attention, entre quote, les apostrophes peuvent faire échapper la chaîne de caractères.

	$txt = 'Bonjour';

	echo $txt . ' Tout le monde ! <br/>';
	echo $txt . " Tout le monde ! <br/>";

	echo "$txt tout le monde!<br/>";
	echo '$txt tout le monde!<br/>'; // entre quote, les variables ne sont pas évaluées, mais simplement considérées comme des chaines de caractères.

	echo '<h2>Constante et constantes magiques</h2>';
	// Une constante, tout comme une variables, permet de conserver (stocker) une valeur. La différence se situe dans le fait qu'on ne puisse pas modifier la valeur d'une constante. Elle est ... CONSTANTE !

	define('CAPITALE', 'Paris');
	echo CAPITALE . '<br/>';
	/*
	define() est la fonction qui nous permet de créer une constante. Elle attend deux arguments :
		1 : Le nom de la constante en MAJ (STRING)
		2 : La valeur stockée
	*/

	// Les constantes magiques :

	echo __DIR__ . '<br/>'; //le dossier dans lequel nous sommes
	echo __FILE__ . '<br/>'; // le fichier dans lequel nous sommes
	echo __LINE__ . '<br/>'; // la ligne dans laquelle nous sommes

	//__FUNCTION__ , __CLASS__ , __METHOD__

	//exercice :

	//1 : Afficher 'Bonjour Julien LEDOUX' en rouge.
	$prenom = 'Julien';
	$nom = 'LEDOUX';

	echo '<span style="color:red">Bonjour ' . $prenom . ' ' . $nom . '</span><br/>';

	echo "<span style=color:red>Bonjour $prenom $nom</span><br/>";

	//2 : Afficher : 'Bleu - Blanc - Rouge' , en utilisant 3 variables (une pour chaque couleur) et la concaténation.

	$bleu = 'Bleu';
	$blanc = 'Blanc';
	$rouge = 'Rouge';

	echo "$bleu - $blanc - $rouge <br/>";

	echo $bleu . " - " . $blanc . " - " . $rouge . "<br/>";

	//mettre un style color à chaque variable
	echo $bleu . " - " . $blanc . " - " . $rouge . "<br/>";


	echo '<h2>Opérateurs Arithmétiques :</h2>';

	$a = 10;
	$b = 2;

	echo $a + $b; // Affiche 12;
	$c = $a + $b;
	echo $c;

	echo $a - $b; // affiche 8
	echo $a * $b; // affiche 20
	echo $a / $b; // affiche 5
	echo $a%$b; // affiche 0

	echo "<br/>";
	// Opération et affectation :

	$a = 10;
	$b = 2;

	echo $a += $b; // $a = $a + $b //A : 12;
	echo $a -= $b; // A : 10;
	echo $a *= $b; // A : 20;
	echo $a /= $b; // A : 10;

	echo '<h2>Structures conditionnelles</h2>';

	//empty() : teste si c'est vide, False, ou égal à 0
	//isset() : teste si quelque chose existe

	$var1 = 0;
	$var2 = 'Mon prénom';
	$var3 = '';

	if (empty($var1)) {

		// instructions à exécuter
	}

	//if, else, elseif

	$a = 10;
	$b = 5;
	$c = 2;

	if ($a > $b) { // Si "a" est supérieur à "b"
		echo 'Oui A est supérieur à B </br>';
	}
	else { // Sinon (A est inférieur ou égal à B)
		echo 'Oui A n\'est supérieur à B </br>';
	}

	if ($a > $b && $b > $c) { // Si A est sup à B et que dans le même temps B est sup à C
		echo 'OK pour les deux conditions<br/>';
	}

	//true && true ===> TRUE
	//true && false ===> FALSE
	//false && true ===> FALSE
	//false && false ===> FALSE

	if ($a == 9 || $b > $c) { // si A contient la valeur 9 OU B est supérieur à C
		echo 'OK pour au moins une des deux conditions<br/>';

	}

	// true || true ===> TRUE
	// true || false ===> TRUE
	// false || true ===> TRUE
	// false || false ===> FALSE

	if ($a == 10 XOR $b == 6) { //Si SOIT A contient la valeur 10 ou SOIT B contient la valeur 6 (condition exclusive)
		echo 'OK pour seulement l\'une des deux conditions<br/>';
	}

	// true XOR true ===> FALSE
	// true XOR false ===> TRUE
	// false XOR true ===> TRUE
	// false XOR false ===> FALSE

	$a = 10;

	if ($a == 8) {
		echo 'A contient la valeur 8</br>';
	}
	elseif($a != 10){
		echo 'A est différent de 10<br/>';
	}
	else {
		echo 'A contient la valeur 10<br/>';
	}

	// = ---> Affectation
	// == ---> Comparaison
	// === ---> Stricte Comparaison

	echo '<h2>Condition switch :</h2>';

	$couleur = 'bleu';

	switch ($couleur) {
		case 'bleu' :
			echo 'Vous aimez le bleu<br/>';
			break;

		case 'rouge':
			echo 'Vous aimez le rouge<br/>';
			break;

		case 'vert':
			echo 'Vous aimez le vert<br/>';
			break;

		default :
			echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert</br>';
		break;
	}

	// Exercice : Faire la même chose mais avec un if(), elseif(), else...:

	$color = "bleu";

	if ($color == "bleu") {
		echo 'Vous aimez le bleu<br/>';
	}
	elseif($color == "rouge"){
		echo 'Vous aimez le rouge<br/>';
	}
	elseif($color == "vert"){
		echo 'Vous aimez le vert<br/>';
	}
	else {
		echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert</br>';
	}

	echo '<h2>Fonctions prédéfinies</h2>';
	// les fonctions prédéfinies existent dans le langage et permettent d'éffectuer des traitements spécifiques. Il en existe plusieurs centaines.. Doc officielle PHP : php.net

	echo date('d/m/Y'); // date() nous permet de récupéré la date du jour et attend en argument (STRING) le format pour récupérer la date.

	echo '<h2>Fonctions prédéfinies sur les chaînes de caractères</h2>';

	$email = 'julien.ledoux@lepoles.com';

	echo strpos($email, '@'); // strpos() (string position) nous retourne l'emplacement d'un caractère dans une CC (chaîne de caractères).
	/*
	2 arguments:
		1 : La cc sur laquelle on travaille
		2 : Le ou les caractère(s) cherchés

	valeurs de retour :
		Succés : N (INT)
		Echec : False (BOOL)
	*/

	$phrase = 'Il fait pas beau aujourd\'hui';

	echo strlen(utf8_decode($phrase)); // strlen() (string length) nous retourne le nombre de caractères dans une CC.Plus précisement cela compte la ressource en nombre d'octets. utf8_decode() 1 caractère = 1 octet.
	/*
	1 argument : la CC en question

	Valeurs de retour :
		Succès : N (INT)
		Echec : FALSE (Bool)
	*/

	$texte = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

	substr(); // substring() (sub string) nous retourne une partie d'une CC.

	/*
	3 arguments :
		1 : La CC
		2 : Le point de départ
		3 : Le nombre de caractères (optionnel)

	Valeurs de retour :
		Succès : XXXXXXX (STR)
		Echec : FALSE (BOOL)
	*/

	echo "<h2>Les fonctions utilisateurs : </h2>";

	//Les fonctions utilisateurs nous permettent d'effectuer des traitements qui ne sont pas prédéfinies dans le langage. Elles sont d'abord déclarées puis éxécutées.

	// 1/ Fonction pour afficher 'Bonjour':
	// Déclaration :
	function bonjour(){
		// traitements / instructions...
		echo 'Bonjour !';
	}
		// Exécution :
	bonjour();

	echo "<br />";

	// 2/ Fonction pour afficher 'Bonjour Chuck' :
	// Déclaration :
	function bonjourPrenom($arg){
		echo "Bonjour" . $arg . " !<br/>";
	}
	// Exécution :
	bonjourPrenom('Tyson');
	bonjourPrenom('Jordan');

	$prenom = 'Jacky';
	bonjourPrenom($prenom);

	// 3/ Fonction pour afficher un titre H2 :

	//Déclaration :
	function titre($arg) {
		echo '<h2>' . $arg . '</h2>';
	}

	// 4/ Fonction pour appliquer la TVA à un prix HT :

	//Déclaration :
	function appliqueTva($prixHt){
		return $prixHt * 1.2;
	}

	// Exécution :
	$montantHt = 164;
	$montantTtc = appliqueTva($montantHt);

	echo 'Le montant de votre commande hors taxes, ' . $montantHt . '€ HT revient à ' . appliqueTva($montantHt) . '€ TTC !<br/>';

	echo "Le montant de votre commande hors taxes, $montantHt €CT revient à $montantTtc €TTC !<br/>";

	//Exercice :

	//Créer une fonction applique TVA 2, qui va nous retourner un prix TTC, converti soit avec un taux de 20% (1.2) soit 10% (1.1) soit 5.5% (1.055).

	// ----------------> Une fonction peut reçevoir 2 arguments ou plus...


	function appliqueTva2($prix, $taux){
		return $prix * $taux;
	}

	$montantHt = 23;
	$tva = 1.055;
	echo appliqueTva2($montantHt, $tva);

	titre("Inclusions de fichier");
	// Les inclusions permettent d'inclure des fichiers. Exemple : On peut inclure des parties communes d'un site (compartiment_site), on peut également inclure du code PHP.

	//include() : S'il y a une erreur sur le fichier inclus, cela affiche les erreurs, et continue le script.

	//require() : S'il y a une erreur sur le fichier inclus, cela affiche les erreurs, et stop l'éxécution du script.

	//include_once() : Même include(), mais si le fichier est inclus plusieurs fois, il ne l'affichera qu'une seule fois.

	//require_once() : Même require(), mais si le fichier est inclus plusieurs fois, il ne l'affichera qu'une seule fois.

	titre('Structure iterative : Les boucles ');

	//BOUCLE -- While :

	$i = 0;
	while($i < 3){
		//traitements à effectuer
		echo $i . '---';
		$i ++;
	}

	echo "<br/><br/>";

	//Exercice : Faire la même chose qui affiche : 0---1---2

	$i = 0;
	while($i < 3){ //$i = 0 // $i = 1 // $i = 2

		if ($i < 2) { // $i = 0 // $i = 1
			echo $i . '---';
		}
		else { // $i = 2
			echo $i;
		}
		$i ++;
	}

	echo "<br/><hr/>";
	//BOUCLE -- for :

	for($i = 0; $i < 3; $i++){
	    echo $i . '---';
	}

	echo '<br/><hr/>';
	// Exercice 1 : Afficher de 0 à 9 grâce à boucle for (0123456789)
	// Exercice 2 : Afficher de 0 à 9 dans un tableau

	echo '<table border="1">';
	echo ' <tr>';
	for($i = 0; $i < 10; $i++){
	    echo '<td>' . $i . '</td>';
	}
	echo ' </tr>';
	echo ' </table>';

	//Exercice 3 : Afficher un tableau avec 10 lignes allant de 0 à 99 (chaque ligne 0-9 // 10-19 ... 90 à 99).

	titre('Tableaux de données ARRAY');
	// un tableau de données array, est déclaré un peu comme une variable améliorée, car on ne conserve pas qu'une seule valeurs mais plusieurs.Les valeurs seront classées ...

	$liste = array('Yakine', 'Hadi', 'Myriem', 'Corinne', 'Pascal');

	//echo $liste; // ERREUR : On ne peux pas faire un echo sur un array.


	//print_r sert a afficher un array(tableau)
	echo '<pre>';
	print_r($liste);
	echo '</pre>';

	titre('Les boucles foreach pour les ARRAY');
	// les boucles foreach sont un moyen simple de passer en revue un tableau de données array.Foreach fonctionne UNIQUEMENT avec les arrays (et les objets).

	$tab[] = "France";
	$tab[] = "Espagne";
	$tab[] = "Italie";
	$tab[] = "Angleterre";
	$tab[] = "Portugal";

	echo '<pre>';
	print_r($tab);
	echo "</pre>";

	echo $tab[2];
	$tab[1] = "Suisse";
	$tab[] = "Allemagne";

	echo '<pre>';
	print_r($tab);
	echo "</pre>";

	echo "<br/>";

	echo 'Boucle foreach : <br/>';
	foreach ($tab AS $valeur) { //Le foreach se comporte comme un curseur qui va parcourir tous les éléments d'un array. Le mot AS fait partie du langage et est OBLIGATOIRE. $valeur va contenir à chaque tour de boucle la valeur trouvée dans l'array.
		echo $valeur . '<br/>';
	}

	echo "<br/>";

	foreach ($tab as $indice => $valeur) { // S'il y a deux variables ($indice => $valeur) dans les paramètres de la boucle foreach, le premier parcourt les indices et le second parcourt les valeurs.
		echo 'A l\'indice : ' . $indice . ' se trouve la valeur : ' . $valeur . '<br/>';
	}

	// Création d'un array avec indices choisis :

	$couleur = array(
		"couleur1" => "Jaune",
		"couleur2" => "Rouge",
		"couleur3" => "Vert",
	);

	echo '<pre>';
	print_r($couleur);
	echo "</pre>";

	titre('Tableau multidimentionnel');

	$tab_multi = array(
		0 => array(
			'prenom' => 'Hadi',
			'nom' =>'Smail'
		),
		1 => array(
			'prenom' => 'Meryem',
			'nom' => 'Boularouk'
		)
	);

	echo '<pre>';
	print_r($tab_multi);
	echo "</pre>";

?>
