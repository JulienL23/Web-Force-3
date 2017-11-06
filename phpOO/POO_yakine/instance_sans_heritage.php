<?php

// instance-sans-heritage.php

class Employes{

    public $prenom;
    public $nom;
    public $salaire;
    public $contrat;
    public $mission;

    public function recevoirVirement(){

    }
}

class Etudiant{

    public $prenom;
    public $nom;
    public $cursus;
    public $planning;
    public $numeroEtudiant;
}

class Professeur extends Employes{}
class Technicien extends Employes{}
class Cadre extends Employes{}

class Eramus extends Etudiant{}
class Boursier extends Etudiant{}
class Apprenti extends Etudiant{}

    class Interne extends Etudiant
    {
        public $employes;
        public $prenom;

        function __construct(){
            $this -> employes = new Employes();

            // Instance sas héritage : Je suis dans la classe Interne, qui aura accès à toutes les propriétés de Etudiant (héritage), mais également à toutes les propriétés de Employes via la propriété $employe qui contient un objet (une instance) de la classe Employes.
        }
    }

    $interne = new Interne();
    $interne -> employes -> recevoirVirement();
    // (objet de la classe employes) -> recevoirVirement();
    echo $interne -> prenom;
 ?>
