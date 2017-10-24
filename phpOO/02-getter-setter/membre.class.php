<?php

// Exercice : au vu de cette classe vous allez devoir écrire les setters et les getters pour cette class.

class Membre
{
    private $prenom;
    private $nom;

    public function __construct($arg1, $arg2) // __construct :  Méthode appellé quand on créé un nouvelle objet et on peut lui donnée des arguments.
    {
        echo 'Instanciation, nous avons reçu l\'argument suivant : ' . $arg1 . $arg2;
        $this->setPrenom($arg1);
        $this->setNom($arg2);
    }
    // Je crée le setter pour l'attribut nom. Il prend en argument la valeur qu'aura l'attribut nom.
    public function setPrenom($arg1) // Donne la valeur
    {
        $this->prenom = $arg1;
    }
    public function setNom($arg2)
    {
        $this->nom = $arg2;
    }
    // Je crée le getter pour l'attribut nom. Il renvoie la valeur de l'attribut nom.
    public function getPrenom() // Récupère la valeur
    {
        return $this->prenom;
    }
    public function getNom()
    {
        return $this->nom;
    }
}
$membre = new Membre('Marc',' Jacob');


?>
