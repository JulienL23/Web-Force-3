<?php

class Etudiant
{
    private $prenom;
    public function __construct($arg)// __construct :  Méthode appellé quand on créé un nouvelle objet et on peut lui donnée des arguments.
    {
        echo 'Instanciation, nous avons reçu l\'argument suivant : ' .$arg;
        $this->setPrenom($arg);
    }
    public function setPrenom($arg)
    {
        $this->prenom = $arg;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
}

$etudiant = new Etudiant('Marc');

// $etudiant->  =  $this , ($this permet de pointer sur lui même)

// set donne une valeur a l'attribut et get permet de récupérer cette valeur.

echo "<pre>";
var_dump($etudiant);
echo "</pre>";

 ?>
