<?php

class Societe
{
 public $adresse;
 public $ville;
 public $cp;

 // Méthode magique qui se déclenche lorsqu'on essaie de donner une valeur à une propriété qui n'existe pas.
 public function __set($nom, $valeur)
 {
   echo "La propriété $nom n'existe PAS et la valeur $valeur n'a donc pas été afféctée.";
 }
 // Méthode magique qui se déclenche lorsqu'on essaie de récupérer une méthode qui n'existe pas.
 public function __get($nom)
 {
   echo "La propriété $nom n'existe pas, je ne peux donc pas l'afficher.";
 }
 // Méthode magique qui se déclenche lorsque l'on appelle une méthode qui n'existe pas.
 public function __call($nom, $arguments)
 {
   echo "Tentative d'exécuter la méthode $nom mais elle n'existe pas. Les arguments étaient " . implode(', ', $arguments) . '.';
 }
}

$societe = new Societe;
$societe->ville = 'Paris';
$societe->pays = 'France'; // La propriété n'existe pas, on déclenche la méthode magique __set() au lieu de créer une nouvelle propriété.
echo $societe->pays; // La propriété n'existe pas, on déclenche la méthode magique __set() au lieu d'afficher une propriété n'existepas
$societe->dsfhriohfd(1,2,3); // La méthode n'existe pas, déclenche __call
