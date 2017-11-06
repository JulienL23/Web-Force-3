<?php

class Vehicule
{
    // Propriété de tous les véhicule
    public $vitesseMax;
    public $nbreRoue;
    public $etat;
    public $couleur;
    public $marque;
    public $nbreplace;

    public function demarrer(){

    }

    public function turnRight(){

    }

    public function turnLeft(){

    }

    public function ouvrir(){

    }

    public function allumerMusic(){

    }

}

class Voiture extends Vehicule
{

}

$mercedes = new Voiture();
$mercedes -> demarrer();
$mercedes -> turnRight();

$cadillac = new Voiture();
$cadillac -> uTurn();

 ?>
